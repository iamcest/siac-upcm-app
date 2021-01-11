<?php 

/**
 * 
 */

class GroupChat
{
	private $table = "group_chats";
	private $group_member_table = "group_members";
	private $group_messages_table = "group_messages";
	private $users = "users";
	private $id_column = "message_id";
	private $user_id = "user_id";
	private $upcm_id = "upcm_id";

	function __construct() {
	}
	public function get($id = 0) {
		if ($id == 0) return false;
		$sql = "SELECT GC.group_id, GC.group_name FROM {$this->table} GC INNER JOIN {$this->group_member_table} GM ON GC.group_id = GM.group_id WHERE GM.user_id = $id";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function get_messages($group_id = 0) {
		if ($group_id == 0) return false;
		$sql = "SELECT file, message, message_date, group_message_id, message_time, sender, U.first_name, U.last_name FROM {$this->group_messages_table} GCM INNER JOIN {$this->users} U ON U.user_id = GCM.sender WHERE GCM.group_id = $group_id";
		$result = execute_query($sql);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}

	public function create_group($data) {
		if (empty($data)) return false;
		extract($data);
		$sql = "INSERT INTO {$this->table} (group_name) VALUES('$group_name')";
		$result = execute_query_return_id($sql);
		return $result;
	}

	public function add_member($group_id, $user_id, $member_type) {
		$sql = "INSERT INTO {$this->group_member_table} (group_id, user_id, member_type) VALUES($group_id, $user_id, '$member_type')";
		$result = execute_query_return_id($sql);
		return $result;
	}

	public function create_message($data = [], $columns = []) {
		if (empty($data)) return false;
		$columns = implode(',',$columns);
		extract($data);
		$sql = "INSERT INTO {$this->group_messages_table} (group_id, sender, message, file) VALUES($group_id, $sender, '$message', '$file');";
		$result = execute_query_return_id($sql);
		return $result;
	}

	public function edit($id, $data = [], $columns = []) {
		if (empty($data) OR empty($id)) return false;
		extract($data);
		$sql = "UPDATE {$this->table} SET image = '$image', title = '$title', content = '$content', description = '$description' WHERE {$this->id_column} = $id;";
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