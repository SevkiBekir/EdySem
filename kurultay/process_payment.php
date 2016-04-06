<?

include_once "sessions.php";
$sessionCourseId=$_SESSION['paymentId'];


if($userId!="" || $sessionCourseId!="")
{

	
	include_once "class.php";
	$txbCCOwnerFLName=$_POST['txbCCOwnerFLName'];
	$txbCCNo=$_POST['txbCCNo'];
	$txbCCSecurityNo=$_POST['txbCCSecurityNo'];
	$cmbCCMonth=$_POST['cmbCCMonth'];
	$cmbCCYear=$_POST['cmbCCYear'];
	$chbAgreement=$_POST['chbAgreement'];
	 $btnPayment=$_POST['btnPayment'];
	
	$txbCCOwnerFLName=Control::textControl($txbCCOwnerFLName);
	$txbCCNo=Control::textControl($txbCCNo);
	$txbCCSecurityNo=Control::textControl($txbCCSecurityNo);
	$cmbCCMonth=Control::textControl($cmbCCMonth);
	$chbAgreement=Control::textControl($chbAgreement);
	$cmbCCYear=Control::textControl($cmbCCYear);
	
	
	
	
	if($btnPayment=="Buy it")
	{
		
		if($chbAgreement==1)
		{
			include_once "header.php";
			ob_start(); 
			include_once "connectionDB.php";
			
			$query="select name, price from courses where id=$sessionCourseId";
				
				$query=mysql_real_escape_string($query);
				
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
				{
					$courseName=$fetchQuery["name"];
					$coursePrice=$fetchQuery["price"];
				}
				
			
			if($txbCCNo==1234 && $txbCCSecurityNo==123 && $cmbCCMonth==5 && $cmbCCYear==2015 && $txbCCOwnerFLName=="kurultay") //Credit Cart Control
			{ 
				$query="select email from users where id=$userId";
				$query=mysql_real_escape_string($query);
				

				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
					 $userEmail=$fetchQuery["email"];
				
				
	
				$query="insert into paymentProcess (userId,price,courseId,situation,date) values ('$userId','$coursePrice','$sessionCourseId','Successfull Payment',NOW())";
				$query=mysql_real_escape_string($query);
				
				$runQuery=mysql_query($query);
				$query="insert into courseToUser (userId, courseId,date) values ($userId,$sessionCourseId,NOW())";
				$query=mysql_real_escape_string($query);
				

				$runQuery=mysql_query($query);
				
				$query="select email,firstName,lastName from users where typeId=3";
				$query=mysql_real_escape_string($query);
				
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
				{
					$adminEmail=$fetchQuery["email"];
					$adminFName=$fetchQuery["firstName"];
					$adminLName=$fetchQuery["lastName"];
					
					$headers = 'From:info@sevkikocadag.com'. "\r\n" .'X-Mailer: PHP/' . phpversion();
					$Subject="Schooling-New Payment";
					$Message="Dear ".$adminFName." ".$adminLName."\n\n".
					"Schooling got a new payment. Information is below:\n".
					"Name: ".$userFName." ".$userLName."\n".
					"Email Address: ".$userEmail."\n\n".
					"Course Information:".
					"Course Name: ".$courseName."\n".
					"Price: ".$coursePrice."\n\n\n".
					"Schooling Team";
					mail($adminEmail,$Subject,$Message,$headers);
				
				}
				$headers = 'From:info@sevkikocadag.com'. "\r\n" .'X-Mailer: PHP/' . phpversion();
				$Subject="Schooling-$courseName Payment Information";
				$Message="Dear ".$userFName." ".$userLName."\n\n".
				"You bought a new course. Information is below:\n".
				"Your First name and Last name: ".$userFName." ".$userLName."\n".
				"Email Address: ".$userEmail."\n\n".
				"Course Information:".
				"Course Name: ".$courseName."\n".
				"Price: ".$coursePrice."\n\n\n".
				"Thank you.\n".
				"Schooling Team";
				mail($userEmail,$Subject,$Message,$headers);
				
				
				?>
				<section id="main_content">
					<div class="container">
							
						<div class="box_style_1 text-center">
			                    <h4 style="color:green;">Successfull!<i class="icon-ok"></i> </h4>
			                    <p>You successfully bought this course. We sent you the billing course.</p> 
			                    <p>Now, you are automatically go to course page in 5 seconds. </p>
			                    <p>Thank you.</p>
			                    <p>Schooling Team</p>
			            </div>
					 </div>
				</section>
				<meta http-equiv="refresh" content="6; url=course.php?courseId=<?  echo $sessionCourseId;?>">
			<?
			$_SESSION['paymentId']="";
			} // Credit Card Control
			else
			{
				$query="insert into paymentProcess (userId,price,courseId,situation,date) values ('$userId','$coursePrice','$sessionCourseId','Credit Card Wrong',NOW())";
				$query=mysql_real_escape_string($query);

				$runQuery=mysql_query($query);

			?>
			<section id="main_content">
					<div class="container">
							
						<div class="box_style_1 text-center">
			                    <h4 style="color:red;">! ! Credit Card Information Wrong ! ! <i class="icon-remove"></i> </h4>
			                    <p>You are not bought this course. Please check your credit card information</p> 
			                    <p>Now, you are automatically go to payment page in 3 seconds. </p>
			                   	<p>Schooling Team</p>
			            </div>
					 </div>
				</section>
				<meta http-equiv="refresh" content="3; url=payment.php?courseId=<?  echo $sessionCourseId;?>">
			<?
			}
			
			
			include_once("footer.php"); 
			ob_end_flush();	
			?>
			</body>
			</html>
			<?
			
		}
		else //chbAggreement
		{
			
			header("Location:payment.php?courseId=$courseId");
			
			
		}
	}							
	else //btnBuy
	{
		
		header("Location:payment.php?courseId=$courseId");
		
	}
	

	
}
else //userId // CourseId
{
	
	header("Location:login.php");
	
}

?>


