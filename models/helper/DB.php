<?php 
require_once $_SERVER['DOCUMENT_ROOT'] ."/config/global.php";

$db = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query( $db, 'SET NAMES "'.DB_ENCODE.'"');

//It shows the error if there any
if (mysqli_connect_errno())
{
	printf("Falló la conexión a la base de datos, verifique que las credenciales de acceso sean las correctas y/o que el servidor de la base de datos se encuentre activo, el error generador se muestra a continuación: %s\n",mysqli_connect_error());
	exit();
}

if (!function_exists('executeQuery'))
{
	function execute_query($sql)
	{
		global $db;
		$query = $db->query($sql);
		return $query;
	}

	function execute_query_return_row($sql)
	{
		global $db;
		$query = $db->query($sql);		
		$row = $query->fetch_assoc();
		return $row;
	}

	function execute_query_return_id($sql)
	{
		global $db;
		$query = $db->query($sql);		
		return $db->insert_id;			
	}
	function clean_string($input) {
	 
	  $search = array(
	    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
	    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
	    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
	    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
	  );
	 
	  $output = preg_replace($search, '', $input);
	  return $output;

	}
	function encode_items($array)
	{
	    foreach($array as $key => $value)
	    {
	        if(is_array($value))
	        {
	            $array[$key] = encode_items($value);
	        }
	        else
	        {
	            $array[$key] = mb_convert_encoding($value, 'Windows-1252', 'UTF-8');
	        }
	    }

	    return $array;
	}
	function sanitize($input) {

	  if (is_array($input)) {
	    foreach($input as $var=>$val) {
	          $output[$var] = clean_string($val);
	    }
	  }
	  else {
	    if (get_magic_quotes_gpc()) {
	      $input = stripslashes($input);
	    }
	    $input  = clean_string($input);
	    $output = mysql_real_escape_string($input);
	  }
	  return $output;

	}

}
