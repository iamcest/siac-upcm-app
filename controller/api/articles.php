
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
		break;	

	case 'create':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		$data['image'] = null;
		if ($_FILES["image"]["error"] != 4) {
			$ext = explode(".", $_FILES['image']['name']);
			$file_name = 'siac_article_image_' .time() .'.' . end($ext);
			if(!move_uploaded_file($_FILES["image"]["tmp_name"], DIRECTORY . "/public/img/articles/covers/" . $file_name)) $helper->response_message('Error', 'No se pudo correctamente la imágen del artículo', 'error');
			$data['image'] = $file_name;
		}
		$columns = ['image', 'title', 'content', 'description', 'user_id'];
		$result = $article->create(sanitize($data), $columns);
		if (!$result) {
			if (!empty($data['image'])) unlink(DIRECTORY . "/public/img/articles/covers/" .$data['image']);
			$helper->response_message('Error', 'No se pudo registrar el artículo correctamente', 'error');
		}
		$helper->response_message('Éxito', 'Se registró el artículo correctamente');
		break;	

	case 'update':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		$id = intval($data['article_id']);
		$data['image'] = null;
		$current_image = $article->get($id, ['image']);
		$current_image = $current_image[0]['image'];
		if ($_FILES["image"]["error"] != 4) {
			if ($_FILES['image']['name'] != $current_image) {
				$ext = explode(".", $_FILES['image']['name']);
				$file_name = 'siac_article_image_' .time() .'.' . end($ext);
				if(!move_uploaded_file($_FILES["image"]["tmp_name"], DIRECTORY . "/public/img/articles/covers/" . $file_name)) $helper->response_message('Error', 'No se pudo correctamente la imágen del artículo', 'error');
				if (!empty($current_image)) unlink(DIRECTORY . "/public/img/articles/covers/" . $current_image);
				$data['image'] = $file_name;
			}
			else{
				$data['image'] = $current_image;
			}
		}
		$result = $article->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'no se pudo editar el artículo', 'error');
		$helper->response_message('Éxito', 'Se editó el artículo correctamente');
		break;	

	case 'delete':
		$id = intval($data['article_id']);
		$image = $article->get($id, ['image']);
		$image = $current_image[0]['image'];
		if(empty(!$image)) unlink(DIRECTORY . "/public/img/articles/covers/" . $image);
		$result = $article->delete($id);
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el artículo correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el artículo correctamente');
		break;

}