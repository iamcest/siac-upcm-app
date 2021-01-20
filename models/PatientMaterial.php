<?php 

/**
 * 
 */

class PatientMaterial
{
	private $table = "patient_materials";
	private $id_column = "patient_material_id";
	private $patient_id = "patient_id";

	function __construct() {
	}
	public function get(int $id = 0, $columns = []) {
		$columns = empty($columns) ? '*' : implode(',', $columns);
		if ($id == 0) return false;
		$sql = "SELECT $columns FROM {$this->table} WHERE {$this->patient_id} = $id";
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
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$title', '$message', '$file', $patient_id);";
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