<?php 

/**
 * 
 */

class MembersSMTP
{
	private $table = "users_smtp";
	private $id_column = "user_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT email, password, email_service FROM " . $this->table. " WHERE " . $this->id_column . " = $id";
		}
		else{
			$sql = "SELECT * FROM " . $this->table;
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function check (int $id) {
		$sql = "SELECT user_id FROM " . $this->table. " WHERE " . $this->id_column . " = $id";
		$result = execute_query($sql);
		return $result;
	}
	public function create($id, $data = [], $columns = []) {
		if (empty($data)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$sql = "INSERT INTO " . $this->table . " ($columns) VALUES($id, '$email', '$password', '$email_service');";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function edit($id, $data = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE " . $this->table . " SET email = '$email', password = '$password', email_service = '$email_service' WHERE " . $this->id_column . " = $id;";
		$result = execute_query($sql);
		return $result;
	}
	public function delete($id) {
		if (empty($id)) return false;
		$sql = "DELETE FROM " . $this->table . " WHERE " . $this->id_column . " = $id;";
		$result = execute_query($sql);
		return $result;
	}

}