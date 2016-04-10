<?php
include_once "sessions.php";

if($userId=='')
{

	include_once("header.php");
	ob_start(); 
	include_once "connectionDB.php";
	
	$email=$_POST["lEmail"];
	$password=$_POST["lPassword"];
	$email=Control::textControl($email);
	$password=Control::textControl($password);
	$password=md5($password);
	$btnLogin=$_POST["btnLogin"];
	if($btnLogin=="Login")
	{
		if($email!="" and $password!="")
		{
			$query="select * from users where email='$email' and password='$password'";
			$x=mysql_query($query);
			$count=0;
			while($y=mysql_fetch_array($x))
			{
				$count++;
				$Id=$y["id"];
				$userFName=$y["firstName"];
				$userLName=$y["lastName"];
			
			
			}
			
			if($count==1)
			{ 
				session_start(); 
				$_SESSION['userEmail']=$email;
				$_SESSION["userId"]=$Id;
				$_SESSION["userFName"]=$userFName;
				$_SESSION["userLName"]=$userLName;
				//echo "<meta http-equiv='refresh' content='0; url=index.php'>";
				header('Location:index.php');
				
		
			}
			else
			{
				
				echo "<script type='text/javascript'>alert('wrong password');</script>";
				echo "<meta http-equiv='refresh' content='0; url=login.php'>";
				
				
			}
	
		}
		else
		{
			echo "<script type='text/javascript'>alert('Please, firstly login');</script>";
			echo "<meta http-equiv='refresh' content='0; url=login.php'>";
		}
	
		ob_end_flush();
	}
	else
	{
		header('Location:login.php');
	}
	include_once("footer.php"); 
}
else
{
	echo "DIT";
	header('Location:index.php');
}

?>

</body>
</html>
