<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Exams.php");
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
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

	case 'get-exam-files':
		$results = $exams->get_exam_file_results($data['patient_id'], $data['exam_id']);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['results', 'exam_date', 'exam_id', 'patient_id'];
		$result = $exams->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el exámen médico correctamente', 'error');
		$record_action = $action->create('añadió resultados del exámen médico ('.$data['exam_name'].') al paciente', 'create', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se registró el exámen médico correctamente', 'success', ['patient_exam_id' => $id]);
		break;

	case 'create-file':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		if (isset($_FILES['file_result'])) {
			$ext = explode(".", $_FILES['file_result']['name']);
			$file_name = $helper->convert_slug($data['exam_name']) .'-' . $data['patient_id'] . '-' .time() .'.' . end($ext);
			if(!move_uploaded_file($_FILES["file_result"]["tmp_name"], DIRECTORY . "/public/exam-files/" . $file_name)) $helper->response_message('Error', 'No se pudo guardar correctamente el achivo, intente de nuevo', 'error');
			$data['file_result'] = $file_name;
		}
		else {
			$helper->response_message('Error', 'No se recibió ningún archivo, intente de nuevo', 'error');			
		}
		$columns = ['file_result', 'exam_date', 'exam_id', 'patient_id'];
		$result = $exams->create_file(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la información correctamente', 'error');
		$helper->response_message('Éxito', 'Se subió el archivo correctamente', 'success', ['patient_exam_file_id' => $id, 'file_result' => $data['file_result']]);
		break;	

	case 'delete':
		$result = $exams->delete(intval($data['patient_exam_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el exámen médico correctamente', 'error');
		$record_action = $action->create('eliminó resultados del exámen médico ('.$data['exam_name'].') al paciente', 'delete', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type','user_id', 'patient_id','upcm_id']);
		$helper->response_message('Éxito', 'Se eliminó el exámen médico correctamente');
		break;

	case 'delete-file':
		if (!isset($data['patient_exam_file_id']) || !isset($data['file_result'])) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data['dir'] = DIRECTORY . '/public/exam-files/' . $data['file_result'];
		if (is_file($data['dir'])) unlink($data['dir']);
		$result = $exams->delete_file(intval($data['patient_exam_file_id']));
			if (!$result) $helper->response_message('Error', 'No se pudo eliminar el registro correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el archivo correctamente');
		break;

}