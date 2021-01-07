<?php 

/**
 * 
 */

class PatientRiskFactors
{
	private $table = "patient_risk_factors";
	private $id_patient_column = "patient_id";
	private $id_column = "risk_factor_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT `name`, results, nomenclature, risk_factor_date FROM {$this->table} WHERE {$this->id_patient_column} = $id ORDER BY risk_factor_date DESC";
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
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$name', '$results', '$nomenclature', $patient_id );";
		$result = execute_query($sql);
		return $result;
	}

	public function update($data = []) {
		if (empty($data)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET results = '$results' WHERE risk_factor_id = $risk_factor_id AND patient_id = $patient_id";
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