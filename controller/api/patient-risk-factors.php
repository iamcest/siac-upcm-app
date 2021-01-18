<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/PatientRiskFactors.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
$risk_factors = New PatientRiskFactors();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		$results = $risk_factors->get(clean_string($query));
		echo json_encode(!empty($results) ? $results : []);
		break;

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['name', 'results', 'nomenclature', 'patient_id'];
		$result = $risk_factors->create($data, $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo actualizar el factor de riesgo correctamente', 'error');
		$record_action = $action->create("actualizó factores de riesgo: ". $data['name'] ." del paciente", 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se actualizó el factor de riesgo correctamente');
		break;

}