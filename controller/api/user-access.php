<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/UserMeta.php";

$user_meta = new UserMeta;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);

if (empty($query)) {
    $query = 0;
}

switch ($method) {

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        else if (empty($_SESSION['user_id'])) {
            $helper->response_message('Advertencia', 'No está autorizado para realizar esta acción', 'warning');
        }
        else if ($_SESSION['user_id'] == 'miembro') {
            $helper->response_message('Advertencia', 'No está autorizado para realizar esta acción', 'warning');
        }
        else if($_SESSION['user_type'] == 'coordinador' && intval($data['upcm_id']) != $_SESSION['upcm_id']) {
            $helper->response_message('Advertencia', 'No está autorizado para realizar esta acción', 'warning');
        }
        $id = $data['user_id'];
        if (isset($data['meta']) && !empty($data['meta'])) {
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta_value = is_object($meta_value) || is_array($meta_value) ? json_encode($meta_value, JSON_UNESCAPED_UNICODE) : $meta_value;
                $meta = ['user_meta_name' => $meta_key, 'user_meta_val' => $meta_value];
                $check_meta = $user_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'user_meta_name' => $meta_key,
                        'user_meta_val' => $meta_value,
                        'user_id' => $id,
                    ];
                    $user_meta->create($meta_data);
                    continue;
                }
                $user_meta->edit($id, $meta);
            }
        }

        $helper->response_message('Éxito', 'Se editó los permisos del miembro correctamente');
        break;

}
