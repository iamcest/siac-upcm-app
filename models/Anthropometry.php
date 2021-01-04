<?php 

/**
 * 
 */

class Anthropometry
{
	private $table = "patient_anthropometries";
	private $id_column = "anthropometry_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT anthropometry_id, weight, height, abdominal_waist, anthropometry_date FROM {$this->table} WHERE patient_id = $id ORDER BY anthropometry_id DESC";
		}
		else{
			$sql = "SELECT anthropometry_id, weight, height, abdominal_waist, anthropometry_date FROM {$this->table} ORDER BY anthropometry_id DESC";
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
		$sql = "SELECT anthropometry_id, weight, height, abdominal_waist FROM {$this->table} WHERE patient_id = $id ORDER BY anthropometry_id DESC LIMIT 1";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function get_general_info($upcm_id) {
		if ($upcm_id == 0) return false;
		$sql = "SELECT CONCAT(first_name,' ', last_name) as full_name, birthdate, gender, weight, height, abdominal_waist FROM {$this->table} as pa RIGHT JOIN patients as p ON pa.patient_id = p.patient_id WHERE p.patient_upcm = $upcm_id AND pa.anthropometry_date = (SELECT MAX(anthropometry_date) FROM {$this->table} pa2 WHERE pa2.patient_id = p.patient_id) GROUP BY p.patient_id; ";
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
		$sql = "INSERT INTO {$this->table} ($columns) VALUES($weight, $height, $abdominal_waist, $patient_id);";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function edit($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET weight = $weight, height = $height, abdominal_waist = $abdominal_waist WHERE {$this->id_column} = $id;";
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