
<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/PatientMaterial.php";
require_once "models/PatientMaterialFiles.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$patient_material = new PatientMaterial;
$patient_material_files = new PatientMaterialFiles;

$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'get':
        if (empty($query)) {
            $query = 0;
        }

        $results = $patient_material->get($query);
        $materials = [];
        foreach ($results as $material) {
            $material['files'] = $patient_material_files->get(0, $material['patient_material_id']);
            $materials[] = $material;
        }
        echo json_encode($materials);
        break;

    case 'get-sent':
        $query = clean_string($query);
        $results = $patient_material->get_sent($query);
        echo json_encode($results);
        break;
    
    case 'get-standard-example':
        set_time_limit(3600);
        $material = sanitize($data);
        $data['first_name'] = 'John';
        $data['last_name'] = 'Doe';
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setIsPhpEnabled(true);
        $options->setIsRemoteEnabled(true);
        $file_name = $helper->convert_slug($material['material_name']) . "-" . time() . ".pdf";
        $upcm_path = DIRECTORY . "/public/material/{$_SESSION['upcm_id']}";
        $temp_dir = $upcm_path . "/{$file_name}";
        ob_start();
        include "views/patient-material/templates/{$material['source']}.php";
        $html = ob_get_clean();
        $dompdf->loadHtml($html);
        $dompdf->set_paper('letter', 'landscape');
        $dompdf->render();
        $data = array(
            'status' => 'success',
            'content' => "data:application/pdf;base64," . base64_encode($dompdf->output('', 'S')),
        );
        echo json_encode($data);
        break;

    case 'create':
        if (empty($_POST)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = $_POST;
        $data['file'] = null;
        $recipient = [
            ['email' => $data['email'], 'full_name' => $data['full_name']],
        ];
        $replyTo = ['email' => $_SESSION['email'], 'full_name' => $_SESSION['first_name'] . " " . $_SESSION['last_name']];
        $files = [];
        if ($data['material'] == 'custom material') {
            $upcm_path = DIRECTORY . "/public/material/{$_SESSION['upcm_id']}";
            set_time_limit(3600);
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setIsPhpEnabled(true);
            $options->setIsRemoteEnabled(true);
            $file_name = $helper->convert_slug($data['full_name']) . "-" . time() . ".pdf";
            $temp_dir = $upcm_path . "/{$file_name}";
            ob_start();
            include "views/document_templates/material.php";
            $html = ob_get_clean();
            $dompdf->loadHtml($html);
            $dompdf->set_paper('letter', 'landscape');
            $dompdf->render();
            $file_generated = file_put_contents($temp_dir, $dompdf->output());
            $files[] = [
                'url' => $temp_dir,
                'name' => $file_name,
                'file_name' => "/public/material/{$_SESSION['upcm_id']}/$file_name",
                'material_type' => 'file_upload',
            ];
            $template = new Template('document_templates/email_material_template', $data);
            $sendEmail = $helper->send_mail($data['title'], $recipient, $replyTo, $template, $files);
            if (!$sendEmail) {$helper->response_message('Error', 'No se pudo enviar el material al correo del paciente', 'error', $sendEmail);}

            $columns = ['title', 'content', 'message', 'material_type', 'file', 'patient_id'];
            $result = $patient_material->create($data, $columns);

            if (!$result) {
                foreach ($files as $file) {
                    unlink(DIRECTORY . $file['url']);
                }
                $helper->response_message('Error', 'No se pudo registrar el material correctamente', 'error');
            }
            foreach ($files as $file) {
                $file['patient_material_id'] = $result;
                $patient_material_files->create($file);
            }
            $helper->response_message('Éxito', 'Se registró el material correctamente', 'success', ['patient_material_id' => $result, 'files' => $files]);
        } else if ($data['material'] == 'template') {
            $upcm_path = DIRECTORY . "/public/material/{$_SESSION['upcm_id']}";
            if (!file_exists($upcm_path)) {
                mkdir($upcm_path, 0755, true);
            }
            $data['templates'] = json_decode($data['templates'], true);
            foreach ($data['templates'] as $material) {
                if ($material['type'] == 'S') {
                    set_time_limit(3600);
                    $dompdf = new Dompdf();
                    $options = $dompdf->getOptions();
                    $options->setIsPhpEnabled(true);
                    $options->setIsRemoteEnabled(true);
                    $file_name = $helper->convert_slug($material['material_name']) . "-" . time() . ".pdf";
                    $temp_dir = $upcm_path . "/{$file_name}";
                    ob_start();
                    include "views/patient-material/templates/{$material['source']}.php";
                    $html = ob_get_clean();
                    $dompdf->loadHtml($html);
                    $dompdf->set_paper('letter', 'landscape');
                    $dompdf->render();
                    $file_generated = file_put_contents($temp_dir, $dompdf->output());
                    $files[] = [
                        'url' => $temp_dir,
                        'name' => $file_name,
                        'file_name' => "/public/material/{$_SESSION['upcm_id']}/$file_name",
                        'material_name' => $material['material_name'],
                        'material_type' => 'template',
                        'material_template_id' => $material['material_id'],
                    ];
                } else if ($material['type'] == 'C') {
                    $ext = explode('.', end(explode('/', $material['source'])));
                    $file_name = $helper->convert_slug($material['material_name']) . '-' . time() . '.' . end($ext);
                    $temp_dir = $upcm_path . "/{$file_name}";
                    $material_source = DIRECTORY . $material['source'];
                    $file_generated = file_put_contents($temp_dir, fopen($material_source, 'r'));
                    $files[] = [
                        'url' => $material_source,
                        'file_name' => "/public/material/{$_SESSION['upcm_id']}/$file_name",
                        'material_type' => 'template',
                        'material_name' => $material['material_name'],
                        'material_template_id' => $material['material_id'],
                    ];
                }
            }
            $template = new Template('document_templates/email_material_template', $data);
            $sendEmail = $helper->send_mail($data['title'], $recipient, $replyTo, $template, $files);
            if (!$sendEmail) {
                foreach ($files as $file) {
                    unlink(DIRECTORY . $file['url']);
                }
                $helper->response_message('Error', 'No se pudo enviar el material al correo del paciente', 'error', $sendEmail);
            } else {
                $columns = ['title', 'content', 'message', 'material_type', 'file', 'patient_id'];
                $result = $patient_material->create($data, $columns);
                if (!$result) {
                    foreach ($files as $file) {
                        unlink(DIRECTORY . $file['url']);
                    }
                    $helper->response_message('Error', 'No se pudo registrar el material correctamente', 'error');
                }
                foreach ($files as $file) {
                    $file['patient_material_id'] = $result;
                    $patient_material_files->create($file);
                }
                $helper->response_message('Éxito', 'Se registró el material correctamente', 'success', ['patient_material_id' => $result, 'files' => $files]);
            }
        } else if ($data['material'] == 'file upload') {
            $file_name = '';
            $temp_dir = '';
            $file = $_FILES["file"];
            if ($file["error"] != 4) {
                $ext = explode('.', $file['name']);
                $file_name = $helper->convert_slug($ext[0]) . '-' . time() . '.' . end($ext);
                $temp_dir = DIRECTORY . "/public/material/{$_SESSION['upcm_id']}/" . $file_name;
                move_uploaded_file($file["tmp_name"], $temp_dir);
                $data['file'] = $file_name;
            }
            $files[] = [
                'url' => "/public/material/{$_SESSION['upcm_id']}/$file_name",
                'name' => "$file_name",
                'file_name' => "/public/material/{$_SESSION['upcm_id']}/$file_name",
                'material_type' => 'file_upload',
            ];
            $template = new Template('document_templates/email_material_template', $data);
            $sendEmail = $helper->send_mail($data['title'], $recipient, $replyTo, $template, $files);
            if (!$sendEmail) {
                $helper->response_message('Error', 'No se pudo enviar el material al correo del paciente', 'error', $sendEmail);
            }
            $columns = ['title', 'content', 'message', 'material_type', 'file', 'patient_id'];
            $result = $patient_material->create($data, $columns);

            if (!$result) {
                foreach ($files as $file) {
                    unlink(DIRECTORY . $file['url']);
                }
                $helper->response_message('Error', 'No se pudo registrar el material correctamente', 'error');
            }
            foreach ($files as $file) {
                $file['patient_material_id'] = $result;
                $patient_material_files->create($file);
            }
            $helper->response_message('Éxito', 'Se registró el material correctamente', 'success', ['patient_material_id' => $result, 'files' => $files]);
        }
        break;

    case 'delete':
        $id = intval($data['patient_material_id']);
        $result = $patient_material->delete($id);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el material correctamente', 'error');
        }
        $helper->response_message('Éxito', 'Se eliminó el material correctamente');
        break;

}