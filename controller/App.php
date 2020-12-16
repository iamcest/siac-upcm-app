<?php 
/**
 * 
 */
if (session_status() === PHP_SESSION_NONE) session_start();
require_once("models/helper/DB.php");
require_once("controller/Helper.php");
require_once("controller/Routes.php");

class App  
{
	function __construct() {
		new Routes();
	}

}