<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Appointments.php");

$appointment = New Appointments();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {
	case 'get':
		$results = $appointment->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['appointment_reason', 'appointment_type', 'appointment_date', 'appointment_time', 'user_id', 'patient_id'];
		$result = $appointment->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la cita correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró la cita correctamente', 'success', ['appointments_id' => $id]);
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$id = intval($data['patient_id']);
		$result = $appointment->edit($id, sanitize($data));
		if (!$result) {
			$helper->response_message('Error', 'No se pudo editar la cita', 'error');
		}
		$helper->response_message('Éxito', 'Se editó la cita correctamente');
		break;	

	case 'delete':
		$result = $appointment->delete(intval($data['appointment_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar la cita correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó la cita correctamente');
		break;

}