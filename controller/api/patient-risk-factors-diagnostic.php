<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/PatientRiskFactorsDiagnostic.php");

$risk_factors = New PatientRiskFactorsDiagnostic();
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
		$check = $risk_factors->get($data['patient_id']);
		$columns = ['risk_factors', 'patient_id'];
		if (empty($check)) {
			$result = $risk_factors->create($data, $columns);
		}
		else{
			$result = $risk_factors->update($data);
		}
		if (!$result) $helper->response_message('Error', 'No se pudo actualizar los datos correctamente', 'error');
		$helper->response_message('Éxito', 'Se actualizaron los datos correctamente');
		break;
}