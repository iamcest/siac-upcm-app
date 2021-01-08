<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/Patients.php");

$patient = New Patients();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {
	case 'get':
		$results = $patient->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-list':
		if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) die(403);
		$id = $_SESSION['upcm_id'];
		$results = $patient->get_list($id);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;

	case 'get-patient-general-info':
		if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) die(403);
		$id = $_SESSION['upcm_id'];
		$results = $patient->get_general_info($id);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;
	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['first_name', 'last_name', 'document_id', 'document_type', 'birthdate', 'gender', 'address', 'email', 'patient_upcm'];
		$data['patient_upcm'] = $_SESSION['upcm_id'];
		$result = $patient->create(sanitize($data), $columns);
		$id = $result;
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el paciente correctamente', 'error');
		$columns = ['patient_id', 'telephone', 'whatsapp', 'telegram', 'sms'];
		$result = $patient->create_contact($id, sanitize($data), $columns);
		if (!$result) {
			$helper->response_message('Error', 'no se pudo registrar la información de contacto del paciente', 'error');
		}
		$helper->response_message('Éxito', 'Se registró el paciente correctamente', 'success', ['patient_id' => $id]);
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$id = intval($data['patient_id']);
		$result = $patient->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar el paciente correctamente', 'error');
		$result = $patient->edit_contact($id, sanitize($data));
		if (!$result) {
			$helper->response_message('Error', 'no se pudo editar la información de contacto del paciente', 'error');
		}
		$helper->response_message('Éxito', 'Se editó el paciente correctamente');
		break;	

	case 'delete':
		$result = $patient->delete(intval($data['patient_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el paciente correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el paciente correctamente');
		break;
		
	case 'update-patient-avatar':
 		$id = intval($_POST['user_id']);
		if (empty($id)) die(403);
		$avatar_file = $_FILES['avatar'];
		$ext = explode(".", $_FILES['avatar']['name']);
		$file_name = 'siac_avatar_' .time() .'.' . end($ext);
		if(!move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name)) $helper->response_message('Error', 'No se pudo guardar correctamente la imágen de perfil del paciente', 'error');
		$result = $patient->update_avatar($id, $file_name);
		$helper->response_message('Éxito', 'La imágen del paciente ha sido actualizada correctamente', 'success');
		break;

}