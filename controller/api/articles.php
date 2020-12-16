
<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/Articles.php");

$article = New Articles();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
		case 'get':
		if (empty($query)) $query = 0;
		$results = $article->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		die();
		break;	

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['title', 'content', 'description', 'user_id'];
		$result = $article->create(sanitize($data), $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el artículo correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró el artículo correctamente');
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$id = intval($data['article_id']);
		$result = $article->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'no se pudo editar el artículo', 'error');
		$helper->response_message('Éxito', 'Se editó el artículo correctamente');
		break;	

	case 'delete':
		$result = $article->delete(intval($data['article_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el artículo correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el artículo correctamente');
		break;

}