<?php 

/**
 * 
 */

class PatientRiskFactorsDiagnostic
{
	private $table = "patient_risk_factors_diagnostic";
	private $id_column = "patient_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $id";
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
		$risk_factors = json_encode($risk_factors);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$risk_factors', $patient_id );";
		$result = execute_query($sql);
		return $result;
	}

	public function update($data = []) {
		if (empty($data)) return false;
		extract($data);
		$risk_factors = json_encode($risk_factors);
		$sql = "UPDATE {$this->table} SET risk_factors = '$risk_factors' WHERE {$this->id_column} = $patient_id";
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