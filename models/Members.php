<?php 

/**
 * 
 */

class Members
{
	private $table = "users";
	private $contact_table = "users_contact";
	private $id_column = "user_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT u.user_id AS user_id, first_name, last_name, email, gender, birthdate, user_type, rol, upcm_id, uc.telephone, uc.whatsapp AS whatsapp, uc.telegram AS telegram, uc.sms AS sms FROM " . $this->table. " as u INNER JOIN ". $this->contact_table. " as uc ON u.user_id = uc.user_id WHERE " . $this->id_column . " = $id";
		}
		else{
			$sql = "SELECT u.user_id AS user_id, first_name, last_name, email, gender, birthdate, user_type, rol, upcm_id, uc.telephone, uc.whatsapp AS whatsapp, uc.telegram AS telegram, uc.sms AS sms FROM " . $this->table . " as u INNER JOIN ". $this->contact_table. " as uc ON u.user_id = uc.user_id";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function get_upcm_members(int $upcm_id = 0) {
		if ($upcm_id == 0) return false;
		$sql = "SELECT avatar, u.user_id AS user_id, first_name, last_name, email, gender, birthdate, user_type, rol, upcm_id, uc.telephone, uc.whatsapp AS whatsapp, uc.telegram AS telegram, uc.sms AS sms FROM {$this->table} as u INNER JOIN {$this->contact_table} as uc ON u.user_id = uc.user_id WHERE upcm_id = $upcm_id";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function get_upcm_doctors(int $upcm_id = 0) {
		if ($upcm_id == 0) return false;
		$sql = "SELECT user_id, CONCAT(first_name, ' ', last_name) AS full_name FROM {$this->table} WHERE upcm_id = $upcm_id AND rol = 'Cardiólogo'";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function check_user($email, $password) {
		$sql = "SELECT u.user_id AS user_id, avatar, first_name, last_name, email, gender, birthdate, user_type, rol, upcm_id, uc.telephone, uc.whatsapp AS whatsapp, uc.telegram AS telegram, uc.sms AS sms FROM {$this->table} as u INNER JOIN {$this->contact_table} as uc ON u.user_id = uc.user_id WHERE email = '$email' AND password = '$password'";
		$result = execute_query($sql);
		if ($result) return $result->fetch_object();
		return null;
	}
	public function create($data = [], $columns = []) {
		if (empty($data)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$password = md5($password);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$first_name', '$last_name', '$email', '$gender', '$birthdate', '$user_type', '$password');";
		if ($user_type == 'coordinador' || $user_type == 'miembro') $sql = "INSERT INTO {$this->table} ($columns) VALUES('$first_name', '$last_name', '$email', '$gender', '$birthdate', '$user_type', '$password', '$rol', $upcm_id);";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function create_contact($id, $data = [], $columns = []) {
		if (empty($data)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$sql = "INSERT INTO {$this->contact_table} ($columns) VALUES($id,'$telephone', $whatsapp, $telegram, $sms);";
		$result = execute_query($sql);
		return $result;
	}
	public function edit($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate', user_type = '$user_type' WHERE {$this->id_column} = $id;";
		if ($user_type == 'coordinador' || $user_type == 'miembro' && !isset($data['password'])) $sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate', user_type = '$user_type', rol = '$rol', upcm_id = $upcm_id WHERE {$this->id_column} = $id;";
		if (isset($data['password'])) {
			$password = md5($password);
			$sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate', user_type = '$user_type', password = '$password' WHERE {$this->id_column} = $id;";
			if ($user_type == 'coordinador' || $user_type == 'miembro') $sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate', user_type = '$user_type', rol = '$rol', upcm_id = $upcm_id, password = '$password' WHERE {$this->id_column} = $id;";
		}
		$result = execute_query($sql);
		return $result;
	}
	public function edit_profile($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate' WHERE {$this->id_column} = $id;";
		if (isset($data['password']) AND $data['password'] != "") {
			$password = md5($password);
			$sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', email = '$email', gender = '$gender', birthdate = '$birthdate', password = '$password' WHERE {$this->id_column} = $id;";
		}
		$result = execute_query($sql);
		return $result;
	}
	public function edit_contact($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->contact_table} SET telephone = '$telephone', whatsapp = '$whatsapp', telegram = '$telegram', sms = '$sms' WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}
	public function update_avatar($id, $file_name) {
		if (empty($file_name) OR empty($id)) return false;
		$sql = "UPDATE {$this->table} SET avatar = '$file_name' WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}
	public function delete($id) {
		if (empty($id)) return false;
		$sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}
	public function form(){
	 	$forms = [
	 		'first_name' => '',
	 		'last_name' => '',
	 		'email' => '',
	 		'registered_at' => Helper::date_formated(),
	 		'birthdate' => '',
	 		'rank' => '',
	 	];
	 	return $forms;
	}

}