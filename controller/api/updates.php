<?php 
/*
*	@var method
* @var query
*/
if (empty($method)) die(403);
require_once("models/ActionsRecord.php");

$action = New ActionsRecord();
$helper = New Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

	case 'get':
		if ($_SESSION['upcm_id'] == null || !isset($_SESSION['upcm_id'])) die(403);
		$results = $action->get($_SESSION['upcm_id']);
		echo json_encode(!empty($results) ? $results : []);
		break;

}