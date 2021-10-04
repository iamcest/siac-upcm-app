<?php
/*
 * @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Appointments.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$appointment = new Appointments();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {
    case 'get':
        $query = clean_string($query);
        if ($query == 'comparison') {
            if (empty($data)) {
                echo json_encode([]);
                die();
            }

            $current_patient_appointments = $appointment->get($data['current_patient_id']);
            $patient_to_compare_appointments = $appointment->get($data['patient_to_compare_id']);

            $results = [
                'current_patient_appointments' => $current_patient_appointments,
                'patient_to_compare_appointments' => $patient_to_compare_appointments,
            ];

            echo json_encode($results);
        } else {
            $results = $appointment->get($query);
            echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
        }

        break;

    case 'get-upcm-appointments':
        if ($_SESSION['upcm_id'] == null or !isset($_SESSION['upcm_id'])) {
            die(403);
        }

        $results = $appointment->get_upcm_all(intval($_SESSION['upcm_id']));
        echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $appointment->create(sanitize($data));
        $id = $result;
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar la cita correctamente', 'error');
        }

        $record_action = $action->create('añadió una nueva cita al paciente', 'create', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se registró la cita correctamente', 'success', ['appointment_id' => $id]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = intval($data['patient_id']);
        $result = $appointment->edit($id, sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar la cita', 'error');
        }

        $record_action = $action->create('editó la cita del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se editó la cita correctamente');
        break;

    case 'finish':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $data = sanitize($data);
        $result = $appointment->finish($data['appointment_id']);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo finalizar la cita', 'error');
        }

        $record_action = $action->create('Finalizó la cita del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se finalizó la cita correctamente');
        break;

    case 'delete':
        $result = $appointment->delete(intval($data['appointment_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar la cita correctamente', 'error');
        }

        $record_action = $action->create('eliminó la cita del paciente', 'delete', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se eliminó la cita correctamente');
        break;

}
