<?php 

/**
 * 
 */

class Patients
{
	private $table = "patients";
	private $contact_table = "patients_contact";
	private $id_column = "patient_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT p.patient_id AS patient_id, first_name, last_name, document_id, document_type, birthdate, email, gender, address, entry_date, patient_upcm, pc.telephone, pc.whatsapp AS whatsapp, pc.telegram AS telegram, pc.sms AS sms FROM {$this->table} as p INNER JOIN {$this->contact_table} as pc ON p.patient_id = pc.patient_id WHERE {$this->id_column} = $id";
		}
		else{
			$sql = "SELECT p.patient_id AS patient_id, first_name, last_name, document_id, document_type, birthdate, email, gender, address, entry_date, patient_upcm, pc.telephone, pc.whatsapp AS whatsapp, pc.telegram AS telegram, pc.sms AS sms FROM {$this->table} as p INNER JOIN {$this->contact_table} as pc ON p.patient_id = pc.patient_id";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function create($data = [], $columns = []) {
		if (empty($data)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$first_name', '$last_name', '$document_id', '$document_type', '$birthdate', '$gender', '$address', '$email', $patient_upcm);";
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
		$sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', document_id = '$document_id', document_type = '$document_type', birthdate = '$birthdate', gender = '$gender', address = '$address', email = '$email' WHERE {$this->id_column} = $id;";
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

}