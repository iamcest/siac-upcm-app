<?php 

/**
 * 
 */

class VitalSignals
{
	private $table = "patient_vital_signals";
	private $id_column = "vital_signals_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT {$this->id_column}, standing, lying_down, sitting, take_date FROM {$this->table} WHERE patient_id = $id ORDER BY take_date DESC";
		}
		else{
			$sql = "SELECT {$this->id_column}, standing, lying_down, sitting, take_date FROM {$this->table} ORDER BY {$this->id_column} DESC";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function get_last(int $id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT {$this->id_column}, standing, lying_down, sitting, take_date FROM {$this->table} WHERE patient_id = $id ORDER BY {$this->id_column} DESC";
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
		$standing = json_encode($standing);
		$lying_down = json_encode($lying_down);
		$sitting = json_encode($sitting);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$standing', '$lying_down', '$sitting', $patient_id);";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function delete($id) {
		if (empty($id)) return false;
		$sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}

}