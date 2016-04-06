<? 
include "sessions.php";

if($userId=='')
{

	include_once("header.php");
	$firstname=$_POST["rFirstName"];
	$lastname=$_POST["rLastName"];
	$email=$_POST["rEmail"];
	$password1=$_POST["rPassword1"];
	$password2=$_POST["rPassword2"];
	$btnRegister=$_POST["btnRegister"];
	if($btnRegister=="Register")
	{
		
		
		if($firstname!="" || $lastname!="" || $email!="" || $password1!="" || $password2!="")
		{
			if($password1==$password2)
			{
				include "connectionDB.php";
				$firstname=Control::textControl($firstname);
				$lastname=Control::textControl($lastname);
				$email=Control::textControl($email);
				$password1=Control::textControl($password1);
				$password2=Control::textControl($password2);
				
				$querySearch="select * from users where email='$email'";
				
				$xx=mysql_query($querySearch);
				$countSearch=0;
				while($yy=mysql_fetch_array($xx))
				{
					
					$countSearch++;
				}
				
				if(!($countSearch>0))
				{
					$password1=md5($password1);	
					
					
						
						$query="INSERT INTO users SET firstName='$firstname', lastName='$lastname', password='$password1', email='$email',date=NOW()";
						mysql_query($query);
						$headers = 'From:info@sevkikocadag.com'. "\r\n" .'X-Mailer: PHP/' . phpversion();
						$Subject="Schooling-Welcome";
						$Message="Dear ".$firstname." ".$lastname."\n\n".
						"Welcome to Schooling. Your information is below:\n".
						
						"Email Address: ".$email."\n\n".
						
						"Password Name: ".$password2."\n\n\n".
						"Schooling Team";
						//echo "To:".$adminEmail.$headers."\n".$Subject."\n".$Message;
						mail($email,$Subject,$Message,$headers);
			

							
						header('Location:login.php');
		
						
				}
				else
				{
				
				
					echo "<script type='text/javascript'>
					
					alert('The username you entered is already exists.');
					
					</script>";
					echo "<meta http-equiv='refresh' content='0; url=login.php'>";
					exit();
				
				}	
					
			
			}
			else
			{
				
				
				echo "<script type='text/javascript'>
				
				alert('Wrong Password.');
				
				</script>";
				
			}
		}
		else
		{
				echo "<script type='text/javascript'>
				
				alert('All sections must be filled.');
				
				</script>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'>";
		
		
		}
	} // btnRegister
	else
	{
		header('Location:register.php');
	}
	include_once("footer.php"); 
}
else
{
	echo "DIT";
	header('Location:index.php');
}

?>