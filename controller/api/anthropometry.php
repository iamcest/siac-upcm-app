<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Anthropometry.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
$anthropometry = New Anthropometry();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {
	case 'get':
		$results = $anthropometry->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-last':
		$results = $anthropometry->get_last($query);
		echo json_encode($results > 0 ? $results[0] : 'No se encontraron resultados');
		break;

	case 'get-patient-general-info':
		if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) die(403);
		$id = $_SESSION['upcm_id'];
		$results = $anthropometry->get_general_info($id);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;
		
	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['weight', 'height', 'abdominal_waist', 'patient_id'];
		$result = $anthropometry->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la antropometría correctamente', 'error');
		$record_action = $action->create('actualizó la antropometría del paciente', 'create', $_SESSION['user_id'], intval($data['patient_id']), $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se registró la antropometría correctamente', 'success', ['anthropometry_id' => $id]);
		break;	

}