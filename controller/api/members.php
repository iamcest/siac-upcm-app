<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Members.php";
require_once "models/UserMeta.php";
require_once "models/UPCMS.php";
require_once "models/Announcements.php";

$announcement = new Announcements;
$member = new Members;
$member_meta = new UserMeta;
$upcms = new UPCMS;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $results = $member->get($query);
        $members = [];
        foreach ($results as $result) {
            $result['meta'] = [];
            $meta = $member_meta->get($result['user_id']);
            foreach ($meta as $i => $e) {
                $result['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val'], true);
            }
            $members[] = $result;
        }

        echo json_encode($members);
        break;

    case 'upcm-members':
        if (empty($_SESSION['upcm_id']) && empty($query)) {
            die(403);
        }
        $upcm_id = empty($query) ? $_SESSION['upcm_id'] : clean_string($query);
        $results = $member->get_upcm_members($upcm_id);
        $members = [];
        foreach ($results as $result) {
            $meta = $member_meta->get($result['user_id']);
            $result['meta'] = [];
            foreach ($meta as $i => $e) {
                $result['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val']);
            }
            $members[] = $result;
        }
        echo json_encode($members);
        break;

    case 'get-doctors':
        if (empty($_SESSION['upcm_id'])) {
            die(403);
        }

        $results = $member->get_upcm_doctors($_SESSION['upcm_id']);
        echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
        die();
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $columns = ['first_name', 'last_name', 'email', 'gender', 'birthdate', 'user_type', 'password'];
        if ($data['user_type'] == 'coordinador' || $data['user_type'] == 'miembro') {
            $columns[] = 'rol';
            $columns[] = 'upcm_id';
            $data['upcm_id'] = intval($data['upcm_id']);
        }
        $result = $member->create($data, $columns);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar el miembro correctamente', 'error');
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $id = $result;
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
        $announcement->create_view($result);
        $columns = ['user_id', 'telephone', 'whatsapp', 'telegram', 'sms'];
        $contact = $member->create_contact($result, sanitize($data), $columns);
        if (!$contact) {
            $helper->response_message('Error', 'no se pudo registrar la información de contacto del miembro', 'error');
        }
        $helper->response_message('Éxito', 'Se registró el miembro correctamente', 'success', ['user_id' => $result]);
        break;

    case 'register-with-invitation':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = $data;
        $data['rol'] = $data['invitation']['rol'];
        $data['user_type'] = $data['invitation']['user_type'];
        $data['upcm_id'] = $data['invitation']['upcm_⁯id'];
        $columns = ['first_name', 'last_name', 'email', 'gender', 'birthdate', 'user_type', 'password', 'rol', 'upcm_id'];
        $result = $member->create($data, $columns);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo procesar el registro correctamente', 'error');
        }
        if (isset($data['access']) && !empty($data['access'])) {
            $id = $result;
            foreach ($data['access'] as $meta_key => $meta_value) {
                $meta_value = is_object($meta_value) || is_array($meta_value) ? json_encode($meta_value, JSON_UNESCAPED_UNICODE) : $meta_value;
                $meta = ['user_meta_name' => $meta_key, 'user_meta_val' => $meta_value];
                $check_meta = $member_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'user_meta_name' => $meta_key,
                        'user_meta_val' => $meta_value,
                        'user_id' => $id,
                    ];
                    $member_meta->create($meta_data);
                    continue;
                }
                $member_meta->edit($id, $meta);
            }
        }
        $columns = ['user_id', 'telephone', 'whatsapp', 'telegram', 'sms'];
        $contact = $member->create_contact($result, $data, $columns);
        if (!$contact) {
            $helper->response_message('Error', 'no se pudo registrar la información de contacto', 'error');
        }
        $_SESSION['user_id'] = $result;
        $_SESSION['avatar'] = null;
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['birthdate'] = $data['birthdate'];
        $_SESSION['user_type'] = $data['user_type'];
        $_SESSION['rol'] = $data['rol'];
        $_SESSION['tos_accepted'] = 0;
        $_SESSION['upcm_id'] = $data['upcm_id'];
        $_SESSION['upcm_name'] = '';
        $_SESSION['meta'] = [];
        $_SESSION['updated_at'] = $helper->datetime_formatted();
        $meta = $member_meta->get($_SESSION['user_id']);
        foreach ($meta as $i => $e) {
            $_SESSION['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val'], true);
        }
        $announcement->create_view($result);
        $_SESSION['announcement_last_update'] = $announcement->get_view($result)[0]['last_update'];
        if (!empty($_SESSION['upcm_id'])) {
            $upcm_selected = $upcms->get($_SESSION['upcm_id']);
            $_SESSION['upcm_name'] = !empty($upcm_selected[0]) ? $upcm_selected[0]['upcm_name'] : '';
        }
        $_SESSION['upcm_logo'] = $member->get_upcm_logo($result);
        $_SESSION['telephone'] = $data['telephone'];
        $_SESSION['whatsapp'] = $data['whatsapp'];
        $_SESSION['telegram'] = $data['telegram'];
        $_SESSION['sms'] = $data['sms'];
        $_SESSION['redirect_url'] = SITE_URL . '/';

        $cookie_email = $_SESSION['email'];
        $cookie_password = $data['password'];
        setcookie('upcm_u', "$cookie_email", time() + 60 * 60 * 24 * 365, '/');
        setcookie('upcm_p', "$cookie_password", time() + 60 * 60 * 24 * 365, '/');
        $_COOKIE['upcm_u'] = $cookie_email;
        $_COOKIE['upcm_p'] = $cookie_password;
        require_once "models/UPCMInvitations.php";

        $upcm_invitation = new UPCMSInvitations;
        $upcm_invitation->mark_as_used($data['invitation']['invitation_code']);
        if ($_SESSION['user_type'] == 'coordinador') {
            foreach ($data['invitations'] as $invitation) {
                $invitation['upcm_id'] = $_SESSION['upcm_id'];
                $invitation['upcm_name'] = $_SESSION['upcm_name'];
                $invitation['invitation_code'] = "{$invitation['upcm_id']}{$helper->rand_string(6)}" . time();
                $invitation['access'] = !empty($invitation['access']) ?
                json_encode($invitation['access'], JSON_UNESCAPED_UNICODE) : $invitation['access'];
                $result = $upcm_invitation->create($invitation);
                if (!$result) {
                    continue;
                }
                $invitation['full_name'] = "{$invitation['first_name']} {$invitation['last_name']}";
                $template = new Template('document_templates/upcm_invitation_template', $invitation);
                $sendEmail = $helper->send_mail(
                    "Invitación de registro a la unidad '{$invitation['upcm_name']}'",
                    [
                        [
                            'email' => $invitation['user_email'],
                            'full_name' => $invitation['full_name'],
                        ],
                    ],
                    [],
                    $template,
                    []
                );
            }
        }
        $helper->response_message('Éxito', 'Se procesó el registro correctamente', 'success', $_SESSION['redirect_url']);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = $data['user_id'];
        $result = $member->edit($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar el miembro correctamente', 'error');
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta_value = is_object($meta_value) || is_array($meta_value) ? json_encode($meta_value, JSON_UNESCAPED_UNICODE) : $meta_value;
                $meta = ['user_meta_name' => $meta_key, 'user_meta_val' => $meta_value];
                $check_meta = $member_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'user_meta_name' => $meta_key,
                        'user_meta_val' => $meta_value,
                        'user_id' => $id,
                    ];
                    $member_meta->create($meta_data);
                    continue;
                }
                $member_meta->edit($id, $meta);
            }
        }
        $result = $member->edit_contact($id, $data);
        if (!$result) {
            $helper->response_message('Error', 'no se pudo editar la información de contacto del miembro', 'error');
        }
        $helper->response_message('Éxito', 'Se editó el miembro correctamente');
        break;

    case 'sign-in':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $email = clean_string($data['email']);
        $password = md5(clean_string($data['password']));
        $result = $member->check_user($email, $password);
        if ($result != null) {
            //We declare the session variables
            $_SESSION['user_id'] = $result->user_id;
            $_SESSION['avatar'] = $result->avatar;
            $_SESSION['first_name'] = $result->first_name;
            $_SESSION['last_name'] = $result->last_name;
            $_SESSION['email'] = $result->email;
            $_SESSION['gender'] = $result->gender;
            $_SESSION['birthdate'] = $result->birthdate;
            $_SESSION['user_type'] = $result->user_type;
            $_SESSION['rol'] = $result->rol;
            $_SESSION['tos_accepted'] = $result->tos_accepted;
            $_SESSION['upcm_id'] = $result->upcm_id;
            $_SESSION['upcm_name'] = '';
            $_SESSION['meta'] = [];
            $_SESSION['updated_at'] = $result->updated_at;
            $meta = $member_meta->get($_SESSION['user_id']);
            foreach ($meta as $i => $e) {
                $_SESSION['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val'], true);
            }
            $announcement_view = $announcement->get_view($result->user_id);
            if (empty($announcement_view[0])) {
                $datetime = $helper->datetime_formatted();
                $announcement->create_view($result->user_id);
                $_SESSION['announcement_last_update'] = $announcement->get_view($result->user_id)[0]['last_update'];
            } else {
                $_SESSION['announcement_last_update'] = $announcement_view[0]['last_update'];
            }
            if (!empty($_SESSION['upcm_id'])) {
                $upcm_selected = $upcms->get($_SESSION['upcm_id']);
                $_SESSION['upcm_name'] = !empty($upcm_selected[0]) ? $upcm_selected[0]['upcm_name'] : '';
            }
            if ($result->user_type !== 'administrador') {
                $_SESSION['upcm_logo'] = $member->get_upcm_logo($result->user_id);
            }
            $_SESSION['telephone'] = $result->telephone;
            $_SESSION['whatsapp'] = $result->whatsapp;
            $_SESSION['telegram'] = $result->telegram;
            $_SESSION['sms'] = $result->sms;
            $_SESSION['redirect_url'] = $_SESSION['user_type'] == 'administrador' ? SITE_URL . '/admin/' : SITE_URL . '/';
            $cookie_email = $_SESSION['email'];
            $cookie_password = $result->password;
            setcookie('upcm_u', "$cookie_email", time() + 60 * 60 * 24 * 365, '/');
            setcookie('upcm_p', "$cookie_password", time() + 60 * 60 * 24 * 365, '/');
            $_COOKIE['upcm_u'] = $cookie_email;
            $_COOKIE['upcm_p'] = $cookie_password;
            $helper->response_message('Éxito', 'Has iniciado sesión correctamente, serás redirigido en unos momentos', 'success', $_SESSION['redirect_url']);
        } else {
            $helper->response_message('Error', 'Credenciales incorrectas, por favor, intente de nuevo', 'error');
        }
        break;

    case 'delete':
        $result = $member->delete(intval($data['user_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el miembro correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el miembro correctamente');
        break;

    case 'get-profile':
        $profile = [
            'first_name' => $_SESSION['first_name'],
            'last_name' => $_SESSION['last_name'],
            'avatar' => $_SESSION['avatar'],
            'email' => $_SESSION['email'],
            'gender' => $_SESSION['gender'],
            'birthdate' => $_SESSION['birthdate'],
            'rol' => $_SESSION['rol'],
            'upcm_id' => $_SESSION['upcm_id'],
            'telephone' => $_SESSION['telephone'],
            'whatsapp' => $_SESSION['whatsapp'],
            'telegram' => $_SESSION['telegram'],
            'sms' => $_SESSION['sms'],
        ];
        echo json_encode($profile);
        die();
        break;

    case 'update-profile':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $id = $_SESSION['user_id'];
        $columns = ['first_name', 'last_name', 'email', 'gender', 'birthdate'];
        $result = $member->edit_profile($id, sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar tu información correctamente', 'error');
        }

        $result = $member->edit_contact($id, sanitize($data));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo editar tu información de contacto correctamente', 'warning');
        }

        $columns[] = 'telephone';
        $columns[] = 'whatsapp';
        $columns[] = 'telegram';
        $columns[] = 'sms';
        foreach ($columns as $key => $value) {
            if ($value == "password") {
                continue;
            }

            $_SESSION[$value] = $data[$value];
        }
        $helper->response_message('Éxito', 'Tu información ha sido actualizada correctamente');
        break;

    case 'update-member-avatar':
        $id = intval($_POST['user_id']);
        if (empty($id)) {
            die(403);
        }

        $avatar_file = $_FILES['avatar'];
        $ext = explode(".", $_FILES['avatar']['name']);
        $file_name = 'siac_avatar_' . time() . '.' . end($ext);
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name)) {
            $helper->response_message('Error', 'No se pudo guardar correctamente la imágen de perfil del miembro', 'error');
        }

        $result = $member->update_avatar($id, $file_name);
        $helper->response_message('Éxito', 'La imágen de perfil ha sido actualizada correctamente');
        break;

    case 'update-avatar':
        $avatar_file = $_FILES['avatar'];
        $id = $_SESSION['user_id'];
        if (empty($id)) {
            die(403);
        }

        $ext = explode(".", $_FILES['avatar']['name']);
        $file_name = 'siac_avatar_' . time() . '.' . end($ext);
        if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name)) {
            $helper->response_message('Error', 'No se pudo guardar correctamente tu imágen de perfil', 'error');
        }

        $result = $member->update_avatar($id, $file_name);
        $_SESSION['avatar'] = $file_name;
        $helper->response_message('Éxito', 'Tu imágen de perfil ha sido actualizada correctamente', 'success');
        break;

    case 'ask-reset-password':
        $email = $data['email'];
        if (empty($email)) {
            die(403);
        }

        $code = $helper->rand_string() . time();
        $check_email = $member->email_exists($email, $code);
        if (!$check_email) {
            $helper->response_message('Error', 'El correo electrónico ingresado no pertenece a ningún usuario', 'error');
        }

        $template = new Template('document_templates/reset_email_template', ['email' => $email, 'code' => $code]);
        $sendEmail = $helper->send_mail('Solicitud de reestablecimiento de contraseña', [['email' => $email, 'full_name' => '']], [], $template, []);
        if (!$sendEmail) {
            $helper->response_message('Error', 'No se pudo enviar el correo de reestablecimiento, intenta de nuevo.', 'error');
        }

        $result = $member->generate_reset_code($email, $code);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo generar el código de reestablecimiento de la contraseña', 'error');
        }

        $helper->response_message('Éxito', 'Solicitud de reestablecimiento procesada correctamente, revisa tu bandeja de correo electrónico para continuar');
        break;

    case 'reset-password':
        $code = $data['code'];
        $password = md5(clean_string($data['password']));
        if (empty($code)) {
            die(403);
        }

        $result = $member->reset_password($code, $password);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo reestablecer tu contraseña, el código no existe o ha expirado.', 'error');
        }

        $helper->response_message('Éxito', 'Tu contraseña ha sido reestablecida correctamente, intenta iniciar sesión nuevamente.');
        break;

    case 'accept-privacy-policy':
        $result = $member->mark_tos_accepted($_SESSION['user_id']);
        if ($result) {
            $_SESSION['tos_accepted'] = 1;
            $helper->response_message('Éxito', 'Política aceptada');
        }
        break;

    case 'deny-privacy-policy':
        $result = $member->delete($_SESSION['user_id']);
        if ($result) {
            //We clean the session variables
            session_unset();
            //Destroy the session
            session_destroy();
            //We redirect the user to the login page
            setcookie('upcm_u', "", time() - 1, '/');
            setcookie('upcm_p', "", time() - 1, '/');
            $helper->response_message('Éxito', 'Política rechazada');
        }
        break;

    case 'logout':
        //We clean the session variables
        session_unset();
        //Destroy the session
        session_destroy();
        //We redirect the user to the login page
        setcookie('upcm_u', "", time() - 1, '/');
        setcookie('upcm_p', "", time() - 1, '/');
        header("Location: " . SITE_URL . "/login");
        break;

}
