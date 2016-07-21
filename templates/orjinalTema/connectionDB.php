
<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
$dbhost = "localhost";
$dbname = "psevkik5_school";
$dbuser = "root";
$dbpass = "";

include_once "class.php";
$password_decrypt = Encryption::decrypt($dbpass);

//Datebase Connections

$dataBus = mysql_connect("$dbhost", "$dbuser","$password_decrypt");
if ( ! $dataBus ) die ("MySQL Error ! Please Report to bekirsevki@gmail.com");

mysql_select_db("$dbname" , $dataBus) or die ("Database connection Failed! Please Report to bekirsevki@gmail.com" . mysql_error() );

mysql_query("SET NAMES 'utf8'"); 
?>