<?php

/**
 *
 */

class Recipes
{
	private $table = "recipes";
	private $id_column = "recipe_id";
	private $patient_id = "patient_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT * FROM {$this->table} WHERE {$this->patient_id} = $id";
		}
		else{
			$sql = "SELECT * FROM {$this->table}";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function create($data = []) {
		if (empty($data)) return false;
		extract($data);
		$diagnostics = json_encode($diagnostics, JSON_UNESCAPED_UNICODE);
		$instructions = json_encode($instructions, JSON_UNESCAPED_UNICODE);
		$sql = "INSERT INTO {$this->table} (appointment_date, next_appointment, diagnostics, instructions, comments, patient_id) VALUES('$appointment_date', '$next_appointment', '$diagnostics', '$instructions', '$comments', $patient_id);";
		$result = execute_query_return_id($sql);
		return $result;
	}

	public function update($data = []) {
		if (empty($data)) return false;
		extract($data);
		$diagnostics = json_encode($diagnostics, JSON_UNESCAPED_UNICODE);
		$instructions = json_encode($instructions, JSON_UNESCAPED_UNICODE);
		$sql = "UPDATE {$this->table} SET appointment_date = '$appointment_date', next_appointment = '$next_appointment', diagnostics = '$diagnostics', instructions = '$instructions', comments = '$comments' WHERE patient_id = $patient_id";
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
