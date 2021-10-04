<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/PatientPlans.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
$patient_plan = New PatientPlans();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		$results = $patient_plan->get(clean_string($query));
		echo json_encode($results);
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$result = $patient_plan->update($data);
		if (!$result) $helper->response_message('Error', 'No se pudo actualizar el plan correctamente', 'error');
		$record_action = $action->create('actualizó el plan del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se actualizó el plan correctamente');
		break;

}