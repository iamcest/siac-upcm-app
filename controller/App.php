<?php
/**
 *
 */

header('Content-Type: text/html; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/*DEBUG ERRORS*/
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
require "controller/Template.php";
require_once "vendor/autoload.php";
require_once "models/helper/DB.php";
require_once "controller/Helper.php";
require_once "controller/Classes/AccessControl.php";
require_once "controller/Routes.php";
require_once "controller/KeepSession.php";

class App
{
    public function __construct()
    {
        new KeepSession();
        $routeInstance = new Routes();
        $routeInstance->init();
    }
}
