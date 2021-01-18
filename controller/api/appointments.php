<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Appointments.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
$appointment = New Appointments();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {
	case 'get':
		$results = $appointment->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-upcm-appointments':
		if ($_SESSION['upcm_id'] == null OR !isset($_SESSION['upcm_id'])) die(403);
		$results = $appointment->get_upcm_all(intval($_SESSION['upcm_id']));
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['appointment_reason', 'appointment_type', 'appointment_date', 'appointment_time', 'user_id', 'patient_id'];
		$result = $appointment->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la cita correctamente', 'error');
		$record_action = $action->create('añadió una nueva cita al paciente', 'create', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se registró la cita correctamente', 'success', ['appointment_id' => $id]);
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$id = intval($data['patient_id']);
		$result = $appointment->edit($id, sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar la cita', 'error');
		$record_action = $action->create('editó la cita del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se editó la cita correctamente');
		break;	

	case 'delete':
		$result = $appointment->delete(intval($data['appointment_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar la cita correctamente', 'error');
		$record_action = $action->create('eliminó la cita del paciente', 'delete', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se eliminó la cita correctamente');
		break;

}