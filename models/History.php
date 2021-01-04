<?php 

/**
 * 
 */

class PatientHistory
{
	private $table = "patient_history";
	private $id_column = "patient_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT history_content, patient_id FROM {$this->table} WHERE {$this->id_column} = $id";
		}
		else{
			$sql = "SELECT history_content, patient_id FROM {$this->table}";
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
		$history_content = json_encode(utf8_encode($history_content));
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$history_content', $patient_id);";
		$result = execute_query($sql);
		return $result;
	}

	public function update($data = []) {
		if (empty($data)) return false;
		extract($data);
		$history_content = json_encode(utf8_encode($history_content));
		$sql = "UPDATE {$this->table} SET history_content = '$history_content' WHERE patient_id = $patient_id";
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