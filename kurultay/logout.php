<?
	ob_start(); 

session_start();
if($_SESSION['userId']!="")
{
	
	session_destroy();
	header("Location:index.php");
}
else
{
	header("Location:login.php");
}
ob_end_flush(); 

?>