
<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/PatientMaterial.php");
USE Dompdf\Dompdf;
USE Dompdf\Options;

$patient_material = New PatientMaterial();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
		case 'get':
		if (empty($query)) $query = 0;
		$results = $patient_material->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;	

	case 'create':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		$data['file'] = null;
		$recipient = [
			['email' => $data['email'],'full_name' => $data['full_name']]
		];
		if ($data['material'] == 'custom material') {
			$dompdf = new Dompdf();
			$options = $dompdf->getOptions();			
			$options->setIsPhpEnabled(true);
			$options->setIsRemoteEnabled(true);
			$file_name = $helper->convert_slug($data['full_name']). "_" . time() .".pdf";
			$folder = DIRECTORY . "/public/material/" . $file_name;
			$temp_dir = $folder;
			ob_start();
				include "views/document_templates/material.php";
			$html = ob_get_clean();
			$dompdf->loadHtml($html);
			$dompdf->set_paper('letter', 'landscape');
			$dompdf->render();
			$file_generated = file_put_contents($temp_dir, $dompdf->output());
			$sendEmail = $helper->send_mail($data['title'], $recipient, Template::material_template($data), $_SESSION['email'], [['url' => $temp_dir, 'name' => $file_name]]);
			unlink($temp_dir);
		}
		else if($data['material'] == 'file upload') {
			$file_name = '';
			$temp_dir = '';
			if ($_FILES["file"]["error"] != 4) {
				$file_name = $_FILES['file']['name'];
				$temp_dir = DIRECTORY . "/public/img/material/" . $file_name;
				move_uploaded_file($_FILES["file"]["tmp_name"], $temp_dir);
				$data['file'] = $file_name;
			}
			$file = [['url' => $temp_dir, 'name' => $file_name]];
			$sendEmail = $helper->send_mail($data['title'], $recipient, Template::material_template($data), $_SESSION['email'], $file);
			unlink($temp_dir);
			if (!$sendEmail) $helper->response_message('Error', 'No se pudo enviar el material al correo del paciente', 'error', $sendEmail);
		}
		$columns = ['title', 'content', 'file', 'patient_id'];
		$result = $patient_material->create($data, $columns);
		if (!$result) {
			$helper->response_message('Error', 'No se pudo registrar el material correctamente', 'error');
		}
		$helper->response_message('Éxito', 'Se registró el artículo correctamente', 'success', ['patient_material_id' => $result, 'file' => $file_name]);
		break;	

	case 'delete':
		$id = intval($data['patient_material_id']);
		$result = $patient_material->delete($id);
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el artículo correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el artículo correctamente');
		break;

}