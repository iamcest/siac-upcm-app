<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/upcms.php");

$upcm = New UPCMS();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
		case 'get':
		if (empty($query)) $query = 0;
		$results = $upcm->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		die();
		break;	

	case 'create':
		if (empty($data)) return 'Ninguna información fue recibida';
		$columns = ['upcm_name', 'upcm_key', 'upcm_coordinator_key', 'upcm_country', 'upcm_state'];
		$result = $upcm->create(sanitize($data), $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo registrar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró la unidad correctamente', 'success', $result);
		break;	

	case 'update':
		if (empty($data)) return 'Ninguna información fue recibida';
		$id = intval($data['upcm_id']);
		$result = $upcm->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se editó la unidad correctamente');
		break;	

	case 'delete':
		$result = $upcm->delete(intval($data['upcm_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar la unidad correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó la unidad correctamente');
		break;
	
}