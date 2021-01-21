
<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/Announcements.php");

$announcement = New Announcements();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
		case 'get':
		if (empty($query)) $query = 0;
		$results = $announcement->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		break;	

	case 'create':
		if (empty($data) or !isset($_SESSION['user_id'])) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['title', 'content', 'user_id', 'group_chat'];
		$id = $_SESSION['user_id'];
		$result = $announcement->create($id, $data, $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el anuncio correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró el anuncio correctamente', 'success', ['announcement_id' => $result, 'user_id' => $id]);
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$id = intval($data['announcement_id']);
		$result = $announcement->edit($id, $data);
		if (!$result) $helper->response_message('Error', 'no se pudo editar el anuncio', 'error');
		$helper->response_message('Éxito', 'Se editó el anuncio correctamente');
		break;	

	case 'delete':
		$result = $announcement->delete(intval($data['announcement_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el anuncio correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el anuncio correctamente');
		break;

	case 'get-author':
		if (empty($data['announcement_id'])) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		if (!isset($_SESSION['user_id'])) die(403);
		$result = $announcement->get_author(intval($data['announcement_id']), intval($data['group_id']), $_SESSION['user_id']);
		echo json_encode($result > 0 ? $result[0] : 'No se encontraron resultados');
		break;

}