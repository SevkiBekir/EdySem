<?
include_once "sessions.php";



if($userId!='')
{

	
	include_once "connectionDB.php";
	$txbCourseName=$_POST['txbCourseName'];
	$txbCourseCatagory=$_POST['txbCourseCatagory'];
	$txbReason=$_POST['txbReason'];
	$txbInstructorSelf=$_POST['txbInstructorSelf'];
	$chbAgreement=$_POST['chbAgreement'];
	$btnApply=$_POST['btnApply'];
	
	$txbCourseName=Control::textControl($txbCourseName);
	$txbCourseCatagory=Control::textControl($txbCourseCatagory);
	$txbReason=Control::textControl($txbReason);
	$txbInstructorSelf=Control::textControl($txbInstructorSelf);



	
	if($btnApply=="Apply")
	{
		
		if($chbAgreement==1)
		{
			include_once("header.php");
			ob_start(); 
			include_once "connectionDB";

			$query="select email from users where id=$userId";
			$runQuery=mysql_query($query);
			while($fetchQuery=mysql_fetch_array($runQuery))
				$userEmail=$fetchQuery["email"];
				
			$query="select name from catagories where id=$txbCourseCatagory";
			$runQuery=mysql_query($query);
			while($fetchQuery=mysql_fetch_array($runQuery))
				$courseCatagory=$fetchQuery["name"];
				
			$query="select email,firstName,lastName from users where typeId=3";
			$runQuery=mysql_query($query);
			while($fetchQuery=mysql_fetch_array($runQuery))
			{
				$adminEmail=$fetchQuery["email"];
				$adminFName=$fetchQuery["firstName"];
				$adminLName=$fetchQuery["lastName"];
				
				$headers = 'From:'.$userEmail. "\r\n" .'X-Mailer: PHP/' . phpversion();
				$Subject="Schooling-Waiting to Become Instructor";
				$Message="Dear ".$adminFName." ".$adminLName."\n\n".
				"Schooling has a new waiting to become instructor. Information is below:\n".
				"Name: ".$userFName." ".$userLName."\n".
				"Email Address: ".$userEmail."\n\n".
				"Course Information:".
				"Course Name: ".$txbCourseName."\n".
				"Course Catagory: ".$courseCatagory."\n".
				"Course Reason: ".$txbReason."\n".
				"InstructorSelf: ".$txbInstructorSelf."\n\n\n".
				"Schooling Team";
				//echo "To:".$adminEmail.$headers."\n".$Subject."\n".$Message;
				mail($adminEmail,$Subject,$Message,$headers);
			
			}
			?>
			<section id="main_content">
				<div class="container">
						
					<div class="box_style_1 text-center">
		                    <h4 style="color:green;">Successfull!<i class="icon-ok"></i> </h4>
		                    <p> Your application was successfully sent us. We will inform you as soon as possible. Please don't forget to check your mailbox. </p>
		                    <p>Thank you.</p>
		                    <p>Schooling Team</p>
		            </div>
				 </div>
			</section>
	
			<?	
			include_once("footer.php"); 
			ob_end_flush();	
			
			
		}
		else //chbAggreement
		{
			
			header('Location:applyInstructor.php');
			
			
		}
	}							
	else //btnApply
	{
		
		header('Location:applyInstructor.php');
		
	}
	

	
}
else //userId
{
	
	header('Location:login.php');
	
}

?>

</body>
</html>
