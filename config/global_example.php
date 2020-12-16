<?php 
//DATABASE HOST
define("DB_HOST","localhost");

//Database name
define("DB_NAME", "db_example_name");

//Database user
define("DB_USERNAME", "root");

//Database user's password
define("DB_PASSWORD", "");

//Character encoding
define("DB_ENCODE","utf8");

//Project Name
define("PROJECT_NAME","PROJECT NAME");

/*Development purpose*/
define("DIRECTORY","C:\Users/user_name\Desktop\App");

//Check if current server has server ssl activated
//It is not required to modify
$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $isSecure = true;
}
$protocol = $isSecure ? 'https://' : 'http://';
define('IS_SECURE', $isSecure);
define('REQUEST_PROTOCOL', $protocol);
define('SITE_URL', REQUEST_PROTOCOL . $_SERVER['HTTP_HOST']);
?>