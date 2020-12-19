<?php 

/**
 * 
 */

class Announcements
{
	private $table = "announcements";
	private $id_column = "announcement_id";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $id ORDER BY published_at DESC";
		}
		else{
			$sql = "SELECT * FROM {$this->table} ORDER BY published_at DESC";
		}
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
	public function create(int $id, $data, $columns = []) {
		if (empty($data) || empty($id)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$sql = "INSERT INTO {$this->table} ($columns) VALUES('$title', '$content', $id);";
		$result = execute_query_return_id($sql);
		return $result;
	}
	public function edit($id, $data = [], $columns = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET title = '$title', content = '$content' WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}
	public function delete($id) {
		if (empty($id)) return false;
		$sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		return $result;
	}

	public function get_author($id) {
		if (empty($id)) return false;
		$sql = "SELECT avatar, first_name, last_name, rol FROM {$this->table} AS a INNER JOIN users AS u ON a.user_id = u.user_id WHERE {$this->id_column} = $id;";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

}