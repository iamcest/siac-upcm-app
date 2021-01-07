<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/PatientRiskFactors.php");

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
		$helper->response_message('Éxito', 'Se actualizó el factor de riesgo correctamente');
		break;

}