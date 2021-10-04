
<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/GroupChat.php";

$group_chat = new GroupChat();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {

    case 'get':
        if (empty($_SESSION['user_id'])) {
            die(403);
        }

        $results = $group_chat->get($_SESSION['user_id']);
        echo json_encode($results > 0 ? $results : []);
        break;

    case 'get-messages':
        if (empty($data['group_id'])) {
            die(403);
        }

        $results = $group_chat->get_messages($data['group_id']);
        echo json_encode($results > 0 ? $results : []);
        break;

    case 'get-unread-messages':
        if (empty($data['group_id']) || empty($data['sender']) || empty($data['date']) || empty($data['time'])) {
            die(403);
        }
        $data = sanitize($data);
        $results = $group_chat->get_unread_messages(
            $data['group_id'],
            $data['sender'],
            $data['date'],
            $data['time']
        );
        echo json_encode($results);
        break;

    case 'get-members':
        if (empty($data['group_id'])) {
            die(403);
        }

        $results = $group_chat->get_members($data['group_id']);
        echo json_encode($results > 0 ? $results : []);
        break;

    case 'create-group':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        if (empty($_SESSION['user_id'])) {
            die(403);
        }

        $result = $group_chat->create_group($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo crear el grupo correctamente', 'error');
        }

        $id = $result;
        $result = $group_chat->add_member($id, $_SESSION['user_id'], 'administrador');
        if (isset($data['external_members']) && !empty($data['members'])) {
            foreach ($data['members'] as $member) {
                $add = $group_chat->add_member($id, $member['user_id'], 'miembro');
            }
        } else if (isset($data['external_members']) && !empty($data['external_members'])) {
            foreach ($data['external_members'] as $member) {
                $add = $group_chat->add_member($id, $member['user_id'], 'miembro');
            }
        }
        $helper->response_message('Éxito', 'Se creó el grupo correctamente', 'success', $id);
        break;

    case 'join-group':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = $data['group_id'];
        $user_id = $data['user_id'];
        $result = $group_chat->add_member($id, $_SESSION['user_id'], 'miembro');
        if (!$result) {
            $helper->response_message('Éxito', 'No se pudo añadir al grupo correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se añadió al grupo correctamente');
        break;

    case 'send-message':
        if (empty($_POST)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $data = $_POST;
        $data['message_date'] = '';
        $data['message_time'] = '';
        if (empty($data['group_id']) || empty($_SESSION['user_id'])) {
            die(403);
        }

        if (isset($_FILES["file"]) && $_FILES["file"]["error"] != 4) {
            $ext = explode(".", $_FILES['file']['name']);
            $suffix = 'document';
            if ($_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == "image/png") {
                $suffix = 'image';
            }

            $file_name = "{$ext[0]}-" . time() . "." . end($ext);
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], DIRECTORY . "/public/media/group_chat/" . $file_name)) {
                $helper->response_message('Error', 'No se pudo guardar correctamente el archivo', 'error');
            }

            $data['file'] = $file_name;
        }
        $data['sender'] = $_SESSION['user_id'];
        $columns = ['group_id', 'sender', 'message', 'file'];
        $result = $group_chat->create_message(sanitize($data), $columns);
        if ($result) {
            $message_date = $group_chat->get_raw($result);
            $data['message_date'] = $message_date[0]['message_date'];
            $data['message_time'] = $message_date[0]['message_time'];
        }
        $helper->response_message(
            'Éxito', 'Se envió el mensaje correctamente', 'success',
            [
                'message_date' => $data['message_date'],
                'message_time' => $data['message_time'],
                'file' => $data['file'],
            ]
        );
        break;

    case 'change-member-type':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $rol = $data['rol'] == 'administrador' ? 'miembro' : 'administrador';
        $result = $group_chat->change_member_type(clean_string($data['group_id']), clean_string($data['user_id']), $rol);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo cambiar los permisos del miembro', 'error');
        }

        $helper->response_message('Éxito', 'Se aplicaron los permisos al miembro correctamente');
        break;

    case 'edit-group-name':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $group_chat->edit_name(clean_string($data['group_id']), clean_string($data['group_name']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo cambiar el nombre del grupo', 'error');
        }

        $helper->response_message('Éxito', 'Se cambió el nombre del grupo correctamente');
        break;

    case 'kick-member':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = intval($data['group_id']);
        $user_id = intval($data['user_id']);
        $result = $group_chat->delete_member($id, $user_id);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo expulsar el miembro del grupo', 'error');
        }

        $helper->response_message('Éxito', 'Se expulsó el miembro del grupo correctamente');
        break;

    case 'leave':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = intval($data['group_id']);
        $user_id = intval($data['user_id']);
        $result = $group_chat->delete_member($id, $user_id);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo salir del grupo correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Saliste del grupo correctamente');
        break;

    case 'delete-group':
        $id = intval($data['group_id']);
        $result = $group_chat->delete(clean_string($id));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el mensaje correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el mensaje correctamente');
        break;

}