
<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/Announcements.php";

$announcement = new Announcements();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case 'get':
        if (empty($query)) {
            $query = 0;
        }
        $announcements = [];
        if ($_SESSION['user_type'] == 'administrador') {
            $results = $announcement->get($query);
            foreach ($results as $result) {
                $result['members'] = [];
                $result['upcms'] = [];
                switch ($result['send_to']) {
                    case 2:
                        $result['members'] = $announcement->get_a_users($result['announcement_id']);
                        break;

                    case 3:
                        $result['upcms'] = $announcement->get_a_upcms($result['announcement_id']);
                        break;

                    case 4:
                        $result['members'] = $announcement->get_a_users($result['announcement_id']);
                        break;
                }
                $announcements[] = $result;
            }
            echo json_encode($announcements);
        } else {
            $results = $announcement->get($query);
            foreach ($results as $result) {
                $result['members'] = [];
                $result['upcms'] = [];
                if ($result['user_id'] == $_SESSION['user_id']) {
                    switch ($result['send_to']) {
                        case 2:
                            $result['members'] = $announcement->get_a_users($result['announcement_id']);
                            break;

                        case 3:
                            $result['upcms'] = $announcement->get_a_upcms($result['announcement_id']);
                            break;

                        case 4:
                            $result['members'] = $announcement->get_a_users($result['announcement_id']);
                            break;
                    }
                    $announcements[] = $result;
                } else {
                    switch ($result['send_to']) {
                        case 0:
                            $announcements[] = $result;
                            break;
                        case 1:
                            if ($result['upcm_id'] == $_SESSION['upcm_id']) {
                                $announcements[] = $result;
                            }
                            break;

                        case 2:
                            if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                                $announcements[] = $result;
                            }
                            break;

                        case 3:
                            if ($announcement->get_a_upcms($result['announcement_id'], $_SESSION['upcm_id']) > 0) {
                                $announcements[] = $result;
                            }
                            break;

                        case 4:
                            if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                                $announcements[] = $result;
                            }
                            break;
                    }
                }

            }
            if ($announcement->update_view($_SESSION['user_id'])) {
                $_SESSION['announcement_last_update'] = $announcement->get_view($_SESSION['user_id'])[0]['last_update'];
            }

            echo json_encode($announcements);
        }
        break;

    case 'create':
        if (empty($data) or !isset($_SESSION['user_id'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = $_SESSION['user_id'];
        if ($data['send_to'] == 2) {
            $data['upcm_id'] = $_SESSION['upcm_id'];
        }
        $result = $announcement->create($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar el anuncio correctamente', 'error');
        }
        switch ($data['send_to']) {
            case 2:
                foreach ($data['members'] as $user) {
                    $item = [
                        'announcement_id' => $result,
                        'user_id' => $user,
                    ];
                    $announcement->create_a_user($item);
                }
                break;

            case 3:
                foreach ($data['upcms'] as $upcm) {
                    $item = [
                        'announcement_id' => $result,
                        'upcm_id' => $upcm,
                    ];
                    $announcement->create_a_upcm($item);
                }
                break;

            case 4:
                foreach ($data['members'] as $user) {
                    $item = [
                        'announcement_id' => $result,
                        'user_id' => $user,
                    ];
                    $announcement->create_a_user($item);
                }
                break;
        }
        $helper->response_message('Éxito', 'Se registró el anuncio correctamente', 'success', ['announcement_id' => $result, 'user_id' => $id]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = intval($data['announcement_id']);
        $result = $announcement->edit($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'no se pudo editar el anuncio', 'error');
        }

        $helper->response_message('Éxito', 'Se editó el anuncio correctamente');
        break;

    case 'delete':
        $result = $announcement->delete(intval($data['announcement_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el anuncio correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el anuncio correctamente');
        break;

    case 'get-author':
        if (empty($data['announcement_id'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        if (!isset($_SESSION['user_id'])) {
            die(403);
        }

        $result = $announcement->get_author(intval($data['announcement_id']), intval($data['group_id']), $_SESSION['user_id']);
        echo json_encode($result > 0 ? $result[0] : 'No se encontraron resultados');
        break;

}