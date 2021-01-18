<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/VitalSignals.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
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
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['standing', 'lying_down', 'sitting', 'patient_id'];
		$result = $vital_signals->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar los signos vitales correctamente', 'error');
		$record_action = $action->create('actualizó los signos vitales del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se registró los signos vitales correctamente');
		break;	

}