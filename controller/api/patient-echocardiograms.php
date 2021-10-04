<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/PatientEchocardiogram.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$patient_echocardiogram = new PatientEchocardiogram;
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

            $current_patient_items = $patient_echocardiogram->get(0, $data['current_patient_id']);
            $patient_to_compare_items = $patient_echocardiogram->get(0, $data['patient_to_compare_id']);

            $results = [
                'current_patient_items' => $current_patient_items,
                'patient_to_compare_items' => $patient_to_compare_items,
            ];

            echo json_encode($results);
        } else {
            $results = $patient_echocardiogram->get(0, $query);
            echo json_encode($results);
        }
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $patient_echocardiogram->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar los datos correctamente', 'error');
        }

        $record_action = $action->create('actualizó el electro cardiograma del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizaron los datos correctamente');
        break;
}
