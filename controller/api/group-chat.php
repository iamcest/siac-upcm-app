
<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/GroupChat.php");

$group_chat = New GroupChat();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {

	case 'get':
		if (!isset($_SESSION['user_id'])) die(403);
		$results = $group_chat->get($_SESSION['user_id']);
		echo json_encode($results > 0 ? $results : []);
		break;

	case 'get-messages':
		if (!isset($data['group_id'])) die(403);
		$results = $group_chat->get_messages($data['group_id']);
		echo json_encode($results > 0 ? $results : []);
		break;	

	case 'create-group':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		if (!isset($_SESSION['user_id'])) die(403);
		$result = $group_chat->create_group($data);
		if (!$result) $helper->response_message('Error', 'No se pudo crear el grupo correctamente', 'error');
		$id = $result;
		$result = $group_chat->add_member($id, $_SESSION['user_id'], 'administrador');
		if (!empty($data['members'])) {
			foreach ($data['members'] as $member) {
				$add = $group_chat->add_member($id, $member['user_id'], 'miembro');
			}
		}
		else if (!empty($data['external_members'])) {
			foreach ($data['external_members'] as $member) {
				$add = $group_chat->add_member($id, $member['user_id'], 'miembro');
			}
		}
		$helper->response_message('Éxito', 'Se creó el grupo correctamente');
		break;

	case 'send-message':
		if (empty($_POST)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$data = $_POST;
		if (!isset($data['group_id']) || !isset($_SESSION['user_id'])) die(403);
		if (isset($_FILES["file"]) && $_FILES["file"]["error"] != 4) {
			$ext = explode(".", $_FILES['file']['name']);
			$suffix = 'document';
			if ($_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == "image/png") $suffix = 'image';
			$file_name = "siac_chat_${suffix}_" .time() . "." . end($ext);
			if(!move_uploaded_file($_FILES["file"]["tmp_name"], DIRECTORY . "/public/media/group_chat/" . $file_name)) $helper->response_message('Error', 'No se pudo guardar correctamente el archivo', 'error');
			$data['file'] = $file_name;
		}
		$data['sender'] = $_SESSION['user_id'];
		$columns = ['group_id', 'sender', 'message', 'file'];
		$result = $group_chat->create_message(sanitize($data), $columns);
		$helper->response_message('Éxito', 'Se envió el mensaje correctamente', 'success', $data['file']);
		break;	

	case 'delete-group':
		$id = intval($data['group_chat_id']);
		$result = $group_chat->delete($id);
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el mensaje correctamente', 'error');
		$helper->response_message('Éxito', 'Se eliminó el mensaje correctamente');
		break;

}