<?php 

/**
 * 
 */

class Appointments
{
	private $table = "patient_appointments";
	private $patient_table = "patients";
	private $doctors = "users";
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