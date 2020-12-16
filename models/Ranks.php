<?php 

/**
 * 
 */
class Ranks 
{
	private $table = "ranks";

	function __construct() {
	}
	public function get(int $id = 0) {
		if ($id != 0) {
			$query = "SELECT rank_name as name, rank_id as value FROM " . $this->table. "WHERE rank_id = $id";
		}
		else{
			$query = "SELECT rank_name as name, rank_id as value FROM " . $this->table;
		}
		$result = execute_query($query);
		$arr = [];
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
		return $arr;
	}
}
 ?>