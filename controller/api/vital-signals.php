<?php
/*
 * @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/VitalSignals.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$vital_signals = new VitalSignals();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $query = clean_string($query);
        if ($query == 'comparison') {
            $data = sanitize($data);
            if (empty($data)) {
                echo json_encode([]);
                die();
            }

            $current_patient_items = $vital_signals->get(0, $data['current_patient_id']);
            $patient_to_compare_items = $vital_signals->get(0, $data['patient_to_compare_id']);

            $results = [
                'current_patient_items' => $current_patient_items,
                'patient_to_compare_items' => $patient_to_compare_items,
            ];

            echo json_encode($results);
        } else {
            $results = $vital_signals->get(0, $query);
            echo json_encode($results);
        }
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $check = $vital_signals->get($data['appointment_id']);
        $result = empty($check) ? $vital_signals->create($data) : $vital_signals->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar los signos vitales correctamente', 'error');
        }

        $record_action = $action->create('actualizó los signos vitales del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizó los signos vitales correctamente');
        break;

}
