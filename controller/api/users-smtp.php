<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/memberSMTP.php");

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

$member_smtp = New MembersSMTP();
$helper = New Helper();
$key = Key::loadFromAsciiSafeString(ENCRYPT_KEY);
$data = json_decode(file_get_contents("php://input"), true);
$id = intval($_SESSION['user_id']);

switch ($method) {
		case 'get':
		$results = $member_smtp->get($id);
		if ($results < 0) $helper->response_message('Advertencia', 'No se encontraron resultados', 'warning');
		$results = ['email' => Crypto::decrypt($results[0]['email'], $key), 'password' => Crypto::decrypt($results[0]['password'], $key), 'email_service' => $results[0]['email_service']];
		echo json_encode($results);
		die();
		break;	

	case 'store':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$columns = ['user_id','email', 'password', 'email_service'];
		$data['email'] = Crypto::encrypt($data['email'], $key);
		$data['password'] = Crypto::encrypt($data['password'], $key);
		$check_info = $member_smtp->get($id);
		$result = '';
		if (empty($check_info)) {
			$result = $member_smtp->create($id, sanitize($data), $columns);
		}
		else{
			$result = $member_smtp->edit($id, sanitize($data));
		}
		if (!$result) $helper->response_message('Error', 'No se pudo registrar las credenciales de correo correctamente', 'error');
		$helper->response_message('Éxito', 'Se registró las credenciales de correo correctamente');
		break;	
		
}