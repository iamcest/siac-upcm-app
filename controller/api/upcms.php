<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/UPCMS.php");

$upcm = New UPCMS();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
if (empty($query)) $query = 0;

switch ($method) {
		case 'get':
		$results = $upcm->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;	

		case 'get-info':
		if ($_SESSION['upcm_id'] == null) echo json_encode(403);
		$results = $upcm->get_info(intval($_SESSION['upcm_id']));
		echo json_encode($results > 0 ? $results[0] : 'No se encontraron resultados');
		break;	

		case 'upcm-list':
		$columns = ['upcm_id','upcm_name'];
		$results = $upcm->get($query, $columns);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		die();
		break;	

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['upcm_name', 'upcm_key', 'upcm_coordinator_key', 'upcm_country', 'upcm_state'];
		$result = $upcm->create(sanitize($data), $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró la unidad correctamente', 'success', $result);
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$id = intval($data['upcm_id']);
		$result = $upcm->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se editó la unidad correctamente');
		break;

	case 'change-name':
		if (empty($data) || $_SESSION['upcm_id'] == null) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$id = intval($_SESSION['upcm_id']);
		$result = $upcm->edit_name($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar el nombre de la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se editó el nombre de la unidad correctamente');
		break;

	case 'change-logo':
		$avatar_file = $_FILES['upcm_logo'];
		$id = $_SESSION['upcm_id'];
		if ($id == null) die(403);
		$ext = explode(".", $_FILES['upcm_logo']['name']);
		$file_name = 'siac_upcm_logo_' .time() .'.' . end($ext);
		if(!move_uploaded_file($_FILES["upcm_logo"]["tmp_name"], DIRECTORY . "/public/img/upcms-logo/" . $file_name)) $helper->response_message('Error', 'No se pudo guardar correctamente el logo de la unidad', 'error');
		$result = $upcm->update_logo($id, $file_name);
		$helper->response_message('Éxito', 'El logo de la unidad ha sido actualizado correctamente', 'success');
		break;	

	case 'delete':
		$result = $upcm->delete(intval($data['upcm_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó la unidad correctamente');
		break;
	
}