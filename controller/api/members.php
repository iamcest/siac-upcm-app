<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die('403');
require_once("models/Members.php");

$member = New Members();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {
		case 'get':
		if (empty($query)) $query = 0;
		$results = $member->get($query);
		echo json_encode($results > 0 ? $results : 'No se encontraron resultados');
		die();
		break;	

	case 'create':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$columns = ['first_name', 'last_name', 'email', 'gender', 'birthdate', 'user_type', 'password'];
		if ($data['user_type'] == 'coordinador' || $data['user_type'] == 'miembro') {
			$columns[] = 'rol'; 
			$columns[] = 'upcm_id';
			$data['upcm_id'] = intval($data['upcm_id']);
		}
		$result = $member->create(sanitize($data), $columns);
		if (!$result) $helper->response_message('Error', 'No se pudo registrar el miembro correctamente', 'error');
		$columns = ['user_id', 'telephone', 'whatsapp', 'telegram', 'sms'];
		$result = $member->create_contact($result, sanitize($data), $columns);
		if (!$result) {
			$helper->response_message('Error', 'no se pudo registrar la información de contacto del miembro', 'error');
		}
		$helper->response_message('Éxito', 'Se registró el miembro correctamente');
		break;	

	case 'update':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
		$id = intval($data['user_id']);
		$result = $member->edit($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar el miembro correctamente', 'error');
		$columns = ['user_id', 'telephone', 'whatsapp', 'telegram', 'sms'];
		$result = $member->edit_contact($id, sanitize($data), $columns);
		if (!$result) {
			$helper->response_message('Error', 'no se pudo editar la información de contacto del miembro', 'error');
		}
		$helper->response_message('Éxito', 'Se editó el miembro correctamente');
		break;	
	case 'sign-in':
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');;
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
			$_SESSION['upcm_id'] = $result->upcm_id;
			$_SESSION['telephone'] = $result->telephone;
			$_SESSION['whatsapp'] = $result->whatsapp;
			$_SESSION['telegram'] = $result->telegram;
			$_SESSION['sms'] = $result->sms;
			$_SESSION['redirect_url'] = $_SESSION['user_type'] == 'administrador' ? SITE_URL.'/admin' : SITE_URL.'/';
			$helper->response_message('Éxito', 'Has iniciado sesión correctamente, serás redirigido en unos momentos', 'success', $_SESSION['redirect_url']);	
		}
		else{
			$helper->response_message('Error', 'Credenciales incorrectas, por favor, intente de nuevo', 'error');	
		}
		break;	

	case 'delete':
		$result = $member->delete(intval($data['user_id']));
		if (!$result) $helper->response_message('Error', 'No se pudo eliminar el miembro correctamente', 'error');
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
		if (empty($data)) $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
		$id = $_SESSION['user_id'];
		$columns = ['first_name', 'last_name', 'email', 'gender', 'birthdate'];
		$result = $member->edit_profile($id,sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar tu información correctamente', 'error');
		$result = $member->edit_contact($id, sanitize($data));
		if (!$result) $helper->response_message('Error', 'No se pudo editar tu información de contacto correctamente', 'warning');
		$columns[] = 'telephone';
		$columns[] = 'whatsapp';
		$columns[] = 'telegram';
		$columns[] = 'sms';
		foreach ($columns as $key => $value) {
				if ($value == "password") continue;
				$_SESSION[$value] = $data[$value];
		}
		$helper->response_message('Éxito', 'Tu información ha sido actualizada correctamente', 'success');
		break;

	case 'update-avatar':
		$avatar_file = $_FILES['avatar'];
		$id = $_SESSION['user_id'];
		$ext = explode(".", $_FILES['avatar']['name']);
		$file_name = 'siac_avatar_' .time() .'.' . end($ext);
		move_uploaded_file($_FILES["avatar"]["tmp_name"], DIRECTORY . "/public/img/avatars/" . $file_name);
		$result = $member->update_avatar($id, $file_name);
		$_SESSION['avatar'] = $file_name;
		$helper->response_message('Éxito', 'Tu imágen de perfil ha sido actualizada correctamente', 'success');
		break;

	case 'logout':
		//We clean the session variables
		session_unset();
	  //Destroy the session
	  session_destroy();
	  //We redirect the user to the login page
	  header("Location: ".SITE_URL."/login");
	break;

}