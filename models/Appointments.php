<?php 

/**
 * 
 */

class Appointments
{
	private $table = "patient_appointments";
	private $patients = "patients";
	private $doctors = "users";
	private $upcms = "upcms";
	private $id_column = "appointment_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT appointment_id, appointment_reason, appointment_type, appointment_date, appointment_time, CONCAT(u.first_name, ' ', u.last_name) AS full_name, u.user_id AS user_id FROM {$this->table} as a INNER JOIN {$this->doctors} as u ON u.user_id = a.user_id WHERE patient_id = $id";
		}
		else{
			$sql = "SELECT appointment_id, appointment_reason, appointment_type, appointment_date, appointment_time, CONCAT(u.first_name, ' ', u.last_name) AS full_name, u.user_id AS user_id FROM {$this->table} as a INNER JOIN {$this->doctors} as u ON u.patient_id = a.patient_id";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function get_upcm_all(int $id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT appointment_id, p.patient_id, CONCAT(p.first_name, ' ', p.last_name) AS patient, appointment_reason, appointment_type, appointment_date, appointment_time, CONCAT(u.first_name, ' ', u.last_name) AS doctor, u.user_id AS user_id FROM {$this->table} AS pa INNER JOIN {$this->patients} AS p ON p.patient_id = pa.patient_id INNER JOIN {$this->doctors} AS u ON u.user_id = pa.user_id INNER JOIN {$this->upcms} AS up ON up.upcm_id = p.patient_upcm WHERE up.upcm_id = $id";
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
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$appointment_reason', '$appointment_type', '$appointment_date', '$appointment_time', $user_id, $patient_id);";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function edit($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET appointment_reason = '$appointment_reason', appointment_type = '$appointment_type', appointment_date = '$appointment_date', appointment_time = '$appointment_time', user_id = '$user_id' WHERE {$this->id_column} = $id;";
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