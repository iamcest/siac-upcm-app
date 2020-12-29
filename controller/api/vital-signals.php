<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/VitalSignals.php");

$vital_signals = New VitalSignals();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		$results = $vital_signals->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['standing', 'lying_down', 'sitting', 'patient_id'];
		$result = $vital_signals->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar los signos vitales correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró los signos vitales correctamente');
		break;	

	case 'delete':
		$result = $vital_signals->delete(intval($data['vital_signals_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar los signos vitales correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó los signos vitales correctamente');
		break;

}