<?php
/*
 * @var method
 * @var query
 */
if (empty($method)) {
    die('403');
}

require_once "models/UPCMInvitations.php";

$upcm_invitation = new UPCMSInvitations;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
if (empty($query)) {
    $query = 0;
}

switch ($method) {
    case 'get':
        $query = empty($query) ? $_SESSION['upcm_id'] : clean_string($query);
        $results = $upcm_invitation->get($query);
        $invitations = [];
        foreach ($results as $result) {
            $result['access'] = !empty($result['access']) ? json_decode($result['access'], true) : [];
            $invitations[] = $result;
        }
        echo json_encode($invitations);
        break;

    case 'check-invitation':
        if (empty($query)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $results = $upcm_invitation->get_by_code(clean_string($query));
        if (empty($results)) {
            $helper->response_message('Advertencia', 'La invitación usada es inválida o no existe', 'warning');
        } else if (!empty($results) && $results[0]['already_used']) {
            $helper->response_message('Error', 'La invitación ya ha sido usada para el registro', 'error');
        } else {
            $results[0]['access'] = !empty($results[0]['access']) ? json_decode($results[0]['access'], true) : [];
            $helper->response_message('Éxito', 'Invitación válida', 'success', $results[0]);
        }
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data['upcm_id'] = empty($data['upcm_id']) ? $_SESSION['upcm_id'] : $data['upcm_id'];
        $data['upcm_name'] = empty($data['upcm_name']) ? $_SESSION['upcm_name'] : $data['upcm_name'];
        $data['invitation_code'] = "{$data['upcm_id']}{$helper->rand_string(6)}" . time();
        $data['access'] = !empty($data['access']) ? 
        json_encode($data['access'], JSON_UNESCAPED_UNICODE) : $data['access'];
        $result = $upcm_invitation->create($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar la invitación correctamente', 'error');
        }
        $data['full_name'] = "{$data['first_name']} {$data['last_name']}";
        $template = new Template('document_templates/upcm_invitation_template', $data);
        $sendEmail = $helper->send_mail("Invitación de registro a la unidad '{$data['upcm_name']}'", [['email' => $data['user_email'], 'full_name' => $data['full_name']]], [], $template, []);
        if (!$sendEmail) {
            $helper->response_message('Error', 'No se pudo enviar el correo de invitación, intenta de nuevo.', 'error');
        }
        $helper->response_message('Éxito', 'Invitación creada y enviada vía correo electrónico', 'success',
            [
                'upcm_invitation_id' => $result,
                'invitation_code' => $data['invitation_code'],
            ]
        );
        break;

    case 'delete':
        $result = $upcm_invitation->delete(clean_string($query));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar la invitación correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó la invitación correctamente');
        break;

}
