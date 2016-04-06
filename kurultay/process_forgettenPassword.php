<?

include_once "sessions.php";


if($userId=="")
{

	
	include_once "class.php";
	$txbEmail=$_POST['txbEmail'];
	
	$btnFP=$_POST['btnFP'];
	
	$txbEmail=Control::textControl($txbEmail);
		

	
	if($btnFP=="Create New Password")
	{
		if($txbEmail!="")
		{
			include_once "header.php";
			ob_start(); 
			include_once "connectionDB.php";
					
			
			$query="select * from users where email='$txbEmail'";
			$x=mysql_query($query);
			$count=0;
			while($y=mysql_fetch_array($x))
			{	$count++;
				$userFName=$y["firstName"];
				$userLName=$y["lastName"];
			
			}
			if($count==1)
			{ 
				
			$password1=rand(100000,999999);
			
			$password=md5($password1);
			
			$query="update users set password='$password' where email='$txbEmail'";
			mysql_query($query);
			
	
					
			$headers = 'From:'."info@sevkikocadag.com" . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
				$Subject="Schooling-New Password Changing Successfully";
				$Message="Dear ".$userFName." ".$userLName.",\n\n".
				"Your login information is below.\n".
				"Email Address: ".$txbEmail."\n".
				"Şifre: ".$password1."\n\n\n".
				"Schooling Team";
				mail($txbEmail,$Subject,$Message,$headers);
				
				?>
				
				<section id="main_content">
				<div class="container">
						
					<div class="box_style_1 text-center">
		                    <h4 style="color:green;">Successfull!<i class="icon-ok"></i> </h4>
		                    <p>Your password was successfully changed </p> 
		                    <p>Now, you are automatically go to home page in 5 seconds. </p>
		                    <p>Thank you.</p>
		                    <p>Schooling Team</p>
		            </div>
				 </div>
			</section>
			<meta http-equiv="refresh" content="5; url=index.php">
				<?		
		
		

	}
	else
	{
				
				?>
				
				<section id="main_content">
				<div class="container">
						
					<div class="box_style_1 text-center">
		                    <h4 style="color:red;">! ! The Email Address Wrong ! ! <i class="icon-remove"></i> </h4>
		                    <p>Please check your credit card information</p> 
		                    <p>Now, you are automatically go to Forgetten Password page in 3 seconds. </p>
		                   	<p>Schooling Team</p>
		            </div>
				 </div>
			</section>
			<meta http-equiv="refresh" content="3; url=forgettenPasword.php">
				<?
				
				echo "<meta http-equiv='refresh' content='0; url=forgettenPasword.php'>";
		
	}
			
		
		
		
		include_once("footer.php"); 
		ob_end_flush();	
		?>
		</body>
		</html>
		<?

		}			
	}							
	else //btnFP
	{
		
		header('Location:login.php');
		
	}
	

	
}
else //userId // CourseId
{
	
	header('Location:index.php');
	
}

?>


