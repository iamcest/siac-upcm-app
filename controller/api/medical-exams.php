<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Exams.php");

$exams = New PatientExams();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		$results = $exams->get_exam_results($data['patient_id'], $data['exam_id']);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-exams-list':
		$results = $exams->get_exams();
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['results', 'exam_date', 'exam_id', 'patient_id'];
		$result = $exams->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el exámen médico correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró el exámen médico correctamente', 'success', ['patient_exam_id' => $id]);
		break;	

	case 'delete':
		$result = $exams->delete(intval($data['patient_exam_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el exámen médico correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el exámen médico correctamente');
		break;

}