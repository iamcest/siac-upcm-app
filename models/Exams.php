<?php 

/**
 * 
 */

class PatientExams
{
	private $table = "patient_exams";
	private $exams_table = "medicals_exams";
	private $id_column = "patient_exam_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT {$this->id_column}, results, exam_date FROM {$this->table} WHERE patient_id = $id ORDER BY exam_date DESC";
		}
		else{
			$sql = "SELECT {$this->id_column}, results, exam_date FROM {$this->table} ORDER BY exam_date DESC";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function get_exams() {
		$sql = "SELECT exam_id, name, nomenclature FROM {$this->exams_table} ORDER BY name ASC";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function get_exam_results(int $id = 0, $exam_id) {
		if ($id == 0) return false;
		$sql = "SELECT {$this->id_column}, results, exam_date FROM {$this->table} WHERE patient_id = $id AND exam_id = $exam_id ORDER BY exam_date DESC";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function get_last(int $id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT {$this->id_column}, results, exam_date FROM {$this->table} WHERE patient_id = $id ORDER BY $id_column DESC";
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
		$sql = "INSERT INTO {$this->table} ($columns) VALUES($results, '$exam_date', $exam_id, $patient_id);";
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