<?php 

/**
 * 
 */

class ActionsRecord
{
	private $table = "actions_history";
	private $users = "users";
	private $patients = "patients";
	private $id_column = "action_history_id";
	private $upcm_id_column = "upcm_id";

	function __construct() {
	}
	public function get(int $upcm_id = 0) {
		if ($upcm_id == 0)  return false;
		$sql = "SELECT U.avatar, U.first_name AS doctor_first_name, U.last_name AS doctor_last_name, action, action_type, AH.registered_at, P.first_name AS patient_first_name, P.last_name AS patient_last_name FROM {$this->table} AH INNER JOIN {$this->users} U ON U.user_id = AH.user_id INNER JOIN {$this->patients} P ON P.patient_id = AH.patient_id WHERE AH.{$this->upcm_id_column} = $upcm_id ORDER BY {$this->id_column} DESC";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function create($action, $action_type , $user_id, $patient_id, $upcm_id, $columns = []) {
		if (empty($action) || $user_id == 0 || $upcm_id == 0) return false;
		$columns = implode(',',$columns);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$action', '$action_type', $user_id,$patient_id, $upcm_id);";
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