<?php
/*
 * @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Anthropometry.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$anthropometry = new Anthropometry();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $data = sanitize($data);
        $query = clean_string($query);
        if ($query == 'comparison') {
            if (empty($data)) {
                echo json_encode([]);
                die();
            }

            $current_patient_appointments = $anthropometry->get(0, $data['current_patient_id']);
            $patient_to_compare_appointments = $anthropometry->get(0, $data['patient_to_compare_id']);

            $results = [
                'current_patient_items' => $current_patient_appointments,
                'patient_to_compare_items' => $patient_to_compare_appointments,
            ];

            echo json_encode($results);
        } else {
            if (!empty($data['appointment_id']) && !empty($data['patient_id'])) {
                $result = $anthropometry->get($data['appointment_id']);
                $results = $anthropometry->get(0, $data['patient_id']);
                echo json_encode(['current_anthropometry' => count($result) > 0 ? $result[0] : [], 'antropometry_history' => $results]);
            } else {
                echo json_encode([]);
            }
        }
        break;

    case 'get-by-list':
        if (empty($data)) {
            die(403);
        }
        $anthropometries = [];
        foreach ($data as $patient_item) {
            $results = $anthropometry->get_last($patient_item['patient_id']);
            if (count($results) > 0) {
                $anthropometries[] = $results[0];
            }
        }
        echo json_encode($anthropometries); 
        break;

    case 'get-last':
        $results = $anthropometry->get_last($query);
        echo json_encode($results > 0 ? $results[0] : []);
        break;

    case 'get-patient-general-info':
        if (empty($_SESSION['upcm_id'])) {
            die(403);
        }

        $id = $_SESSION['upcm_id'];
        $results = $anthropometry->get_general_info($id);
        echo json_encode($results);
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $anthropometry->create(sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar la antropometría correctamente', 'error');
        }

        $record_action = $action->create('actualizó la antropometría del paciente', 'create', $_SESSION['user_id'], intval($data['patient_id']), $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se registró la antropometría correctamente', 'success');
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $anthropometry->edit(sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar la antropometría correctamente', 'error');
        }

        $record_action = $action->create('actualizó la antropometría del paciente', 'create', $_SESSION['user_id'], intval($data['patient_id']), $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizó la antropometría correctamente', 'success');
        break;

}
