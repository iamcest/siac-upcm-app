<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/History.php");

$history = New PatientHistory();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		$results = $history->get(clean_string($query));
		echo json_encode(!empty($results) ? $results : []);
		break;

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$check = $history->get($data['patient_id']);
		$columns = ['history_content', 'patient_id'];
		if (empty($check)) {
			$result = $history->create($data, $columns);
		}
		else{
			$result = $history->update($data);
		}
		if (!$result) $helper->response_message('Error', 'No se pudo actualizar los antecedentes correctamente', 'error');
		$helper->response_message('Éxito', 'Se actualizó los antecedentes correctamente');
		break;

	case 'delete':
		$result = $history->delete(intval($data['patient_exam_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar los antecedentes correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminaron los antecedentes correctamente');
		break;

}