<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Patients.php";
require_once "models/PatientMeta.php";
require_once "models/ActionsRecord.php";

$patient = new Patients;
$patient_meta = new PatientMeta;
$action = new ActionsRecord;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $query = clean_string($query);
        if (isset($_SESSION['user_id'])) {
            $upcm_id = !empty($_SESSION['upcm_id']) ? $_SESSION['upcm_id'] : 0;
            $results = $_SESSION['user_type'] == 'administrador' ? $patient->get($query) : $patient->get($query, $upcm_id);
            $patients = [];
            foreach ($results as $result) {
                $meta = $patient_meta->get($result['patient_id']);
                $result['meta'] = [];
                foreach ($meta as $i => $e) {
                    $result['meta'][$e['patient_meta_name']] = $e['patient_meta_val'];
                }
                $patients[] = $result;
            }
            echo json_encode($patients);
        } else {
            echo json_encode([]);
        }
        break;

    case 'get-external':
        $query = clean_string($query);
        $results = $patient->get(0, 0, $_SESSION['upcm_id']);
        echo json_encode($results);
        break;

    case 'get-list':
        if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) {
            die(403);
        }
        $id = $_SESSION['upcm_id'];
        $results = $patient->get_list($id);
        echo json_encode($results);
        break;

    case 'get-patient-general-info':
        if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) {
            die(403);
        }

        $id = $_SESSION['upcm_id'];
        $results = $patient->get_general_info($id);
        echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
        break;
    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = sanitize($data);
        $data['patient_upcm'] = $_SESSION['upcm_id'];
        $result = $patient->create($data);
        $id = $result;
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar el paciente correctamente', 'error');
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = [
                    'patient_meta_name' => $meta_key,
                    'patient_meta_val' => $meta_value,
                    'patient_id' => $id,
                ];
                $patient_meta->create($meta);
            }
        }
        $record_action = $action->create('añadió un nuevo paciente', 'create', $_SESSION['user_id'], $id, $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $result = $patient->create_contact($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'no se pudo registrar la información de contacto del paciente', 'error');
        }
        $helper->response_message('Éxito', 'Se registró el paciente correctamente', 'success', ['patient_id' => $id]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = sanitize($data);
        $id = $data['patient_id'];
        $result = $patient->edit($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar el paciente correctamente', 'error');
        }

        $record_action = $action->create('editó la información general del paciente', 'update', $_SESSION['user_id'], $id, $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $result = $patient->edit_contact($id, $data);
        if (isset($data['meta']) && !empty($data['meta'])) {
            $id = clean_string($data['patient_id']);
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = ['patient_meta_name' => $meta_key, 'patient_meta_val' => $meta_value];
                $check_meta = $patient_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'patient_meta_name' => $meta_key,
                        'patient_meta_val' => $meta_value,
                        'patient_id' => $id,
                    ];
                    $patient_meta->create($meta_data);
                    continue;
                }
                $patient_meta->edit($id, $meta);
            }
        }
        if (!$result) {
            $helper->response_message('Error', 'no se pudo editar la información de contacto del paciente', 'error');
        }
        $helper->response_message('Éxito', 'Se editó el paciente correctamente');
        break;

    case 'delete':
        $result = $patient->delete(intval($data['patient_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el paciente correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el paciente correctamente');
        break;

    case 'update-member-avatar':
        $id = intval($_POST['user_id']);
        if (empty($id)) {
            die(403);
        }

        $avatar_file = $_FILES['avatar'];
        $ext = explode(".", $_FILES['avatar']['name']);
        $file_name = 'siac_avatar_' . time() . '.' . end($ext);
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name)) {
            $helper->response_message('Error', 'No se pudo guardar correctamente la imágen de perfil del miembro', 'error');
        }

        $result = $member->update_avatar($id, $file_name);
        $helper->response_message('Éxito', 'La imágen de perfil ha sido actualizada correctamente');
        break;

    case 'update-avatar':
        if (empty($_POST)) {
            die(403);
        }

        $id = intval($_POST['patient_id']);
        $avatar_file = $_FILES['avatar'];
        $ext = explode(".", $_FILES['avatar']['name']);
        $file_name = 'siac_patient_avatar_' . time() . '.' . end($ext);
        $patient_data = $patient->get($id);
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name)) {
            $helper->response_message('Error', 'No se pudo guardar correctamente la imágen de perfil del paciente', 'error');
        }

        $result = $patient->update_avatar($id, $file_name);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo guardar correctamente la información de la imágen de perfil del paciente', 'error');
        }

        if (!empty($patient_data[0]['avatar'])) {
            unlink(DIRECTORY . "/public/img/avatars/" . $patient_data[0]['avatar']);
        }

        $helper->response_message('Éxito', 'La imágen del paciente ha sido actualizada correctamente', 'success', ['avatar' => $file_name]);
        break;

}
