<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/UPCMS.php";
require_once "models/UPCMMeta.php";

$upcm = new UPCMS;
$upcm_meta = new UPCMMeta;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);

if (empty($query)) {
    $query = 0;
}

switch ($method) {
    case 'get':
        $results = $upcm->get($query);
        $upcms = [];
        foreach ($results as $result) {
            $meta = $upcm_meta->get($result['upcm_id']);
            $result['meta'] = [];
            foreach ($meta as $i => $e) {
                $result['meta'][$e['upcm_meta_name']] = $e['upcm_meta_val'];
            }
            $upcms[] = $result;
        }
        echo json_encode($upcms);
        break;

    case 'get-info':
        if (empty($_SESSION['upcm_id'])) {
            die(403);
        }

        $results = $upcm->get_info($_SESSION['upcm_id']);
        $upcms = [];
        foreach ($results as $result) {
            $meta = $upcm_meta->get($_SESSION['upcm_id']);
            $result['meta'] = [];
            foreach ($meta as $i => $e) {
                $result['meta'][$e['upcm_meta_name']] = $e['upcm_meta_val'];
            }
            $upcms[] = $result;
        }
        echo json_encode($upcms > 0 ? $upcms[0] : []);
        break;

    case 'upcm-list':
        $columns = ['upcm_id', 'upcm_name'];
        $results = $upcm->get($query, $columns);
        echo json_encode($results);
        die();
        break;

    case 'create':
        if (empty($_POST)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = sanitize($_POST);
        $result = $upcm->create($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar la unidad correctamente', 'error');
        }
        if (!empty($_FILES['upcm_image'])) {
            $ext = explode(".", $_FILES['upcm_image']['name']);
            $file_name = 'siac_upcm_logo_' . time() . '.' . end($ext);
            if (move_uploaded_file($_FILES["upcm_image"]["tmp_name"], DIRECTORY . "/public/img/upcms-logo/" . $file_name)) {
                $upcm->update_logo($result, $file_name);
                $data['upcm_logo'] = $file_name;
            }
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            $data['meta'] = json_decode($data['meta'], true);
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = [
                    'upcm_meta_name' => $meta_key,
                    'upcm_meta_val' => $meta_value,
                    'upcm_id' => $result,
                ];
                $upcm_meta->create($meta);
            }
        }

        $helper->response_message(
            'Éxito', 
            'Se registró la unidad correctamente', 
            'success', 
            [
                'upcm_id' => $result,
                'upcm_logo' => $data['upcm_logo']
            ]
        );
        break;

    case 'update':
        if (empty($_POST)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = sanitize($_POST);
        $id = $data['upcm_id'];
        if (!empty($_FILES['upcm_image'])) {
            $ext = explode(".", $_FILES['upcm_image']['name']);
            $file_name = 'siac_upcm_logo_' . time() . '.' . end($ext);
            if (move_uploaded_file($_FILES["upcm_image"]["tmp_name"], DIRECTORY . "/public/img/upcms-logo/" . $file_name)) {
                if ($upcm->update_logo($id, $file_name)) {
                    !empty($data['upcm_logo']) ? unlink(DIRECTORY . "/public/img/upcms-logo/" . $data['upcm_logo']) : '';
                    $data['upcm_logo'] = $file_name;
                }
            }
        }
        $result = $upcm->edit($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar la unidad correctamente', 'error');
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            $data['meta'] = json_decode($data['meta'], true);
            $id = clean_string($data['upcm_id']);
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = ['upcm_meta_name' => $meta_key, 'upcm_meta_val' => $meta_value];
                $check_meta = $upcm_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'upcm_meta_name' => $meta_key,
                        'upcm_meta_val' => $meta_value,
                        'upcm_id' => $id,
                    ];
                    $upcm_meta->create($meta_data);
                    continue;
                }
                $upcm_meta->edit($id, $meta);
            }
        }

        $helper->response_message(
            'Éxito', 
            'Se editó la unidad correctamente', 
            'success', 
            [
                'upcm_logo' => $data['upcm_logo']
            ]
        );
        break;

    case 'update-my-upcm':
        if (empty($data) || empty($_SESSION['upcm_id'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $id = $_SESSION['upcm_id'];
        $result = $upcm->edit($id, sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar el nombre de la unidad correctamente', 'error');
        }

        if (isset($data['meta']) && !empty($data['meta'])) {
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = ['upcm_meta_name' => $meta_key, 'upcm_meta_val' => $meta_value];
                $check_meta = $upcm_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'upcm_meta_name' => $meta_key,
                        'upcm_meta_val' => $meta_value,
                        'upcm_id' => $id,
                    ];
                    $upcm_meta->create($meta_data);
                    continue;
                }
                $upcm_meta->edit($id, $meta);
            }
        }

        $_SESSION['upcm_name'] = $data['upcm_name'];
        $helper->response_message('Éxito', 'Se editó la información de la correctamente');
        break;

    case 'change-logo':
        $avatar_file = $_FILES['upcm_logo'];
        $id = $_SESSION['upcm_id'];
        if ($id == null) {
            die(403);
        }

        $ext = explode(".", $_FILES['upcm_logo']['name']);
        $file_name = 'siac_upcm_logo_' . time() . '.' . end($ext);
        if (!move_uploaded_file($_FILES["upcm_logo"]["tmp_name"], DIRECTORY . "/public/img/upcms-logo/" . $file_name)) {
            $helper->response_message('Error', 'No se pudo guardar correctamente el logo de la unidad', 'error');
        }

        $result = $upcm->update_logo($id, $file_name);
        $helper->response_message('Éxito', 'El logo de la unidad ha sido actualizado correctamente', 'success');
        break;

    case 'delete':
        $result = $upcm->delete(intval($data['upcm_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar la unidad correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó la unidad correctamente');
        break;

}
