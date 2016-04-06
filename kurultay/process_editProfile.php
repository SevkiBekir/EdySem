<?
include_once "sessions.php";



if($userId!='')
{

	
	include_once "connectionDB.php";
	$fileProfileImage=$_FILES['fileProfileImage']['name'];
	$txbFirstName=$_POST['txbFirstName'];
	$txbLastName=$_POST['txbLastName'];
	
	 $txbOldPassword=$_POST['txbOldPassword'];
	 $txbNewPassword1=$_POST['txbNewPassword1'];
	 $txbNewPassword2=$_POST['txbNewPassword2'];
	
	$txbAge=$_POST['txbAge'];
	$cmbEducationLevel=$_POST['cmbEducationLevel'];
	$cmbOccupation=$_POST['cmbOccupation'];
	$txbTelephone=$_POST['txbTelephone'];
	$txbFbUserName=$_POST['txbFbUserName'];
	$txbTwUserName=$_POST['txbTwUserName'];
	$txbAbout=$_POST['txbAbout'];
	
	$btnEdit=$_POST['btnEdit'];
	
	include_once "class.php";
	$txbFirstName=Control::textControl($txbFirstName);
	$txbFirstName=Control::textControl($txbFirstName);
	$txbLastName=Control::textControl($txbLastName);
	$txbOldPassword=Control::textControl($txbOldPassword);
	$txbAge=Control::textControl($txbAge);
	$txbTelephone=Control::textControl($txbTelephone);
	$txbFbUserName=Control::textControl($txbFbUserName);
	$txbTwUserName=Control::textControl($txbTwUserName);


	
	
	if($btnEdit=="Edit")
	{
		
		if($txbFirstName!="" || $txbLastName!="" || $cmbEducationLevel!="" || $cmbOccupation!="")
		{
			include_once("header.php");
			ob_start(); 
			include_once "connectionDB";
			
			
			if($fileProfileImage!="")
			{
				$date= date("m_d_Y");
				$uploaddir = 'uploads/profile/';
				
				
				$parcala_behcet = explode(".",$fileProfileImage); //noktadan sonralarını alır
				$uzanti = '.'.$parcala_behcet[count($parcala_behcet)-1]; //son...
				
				
				// UZANTI İZİNLERİ KONTROL EDİLİYOR
				
				if ($uzanti == '.jpeg' or $uzanti=='.jpg' or $uzanti == '.JPEG' or $uzanti=='.JPG')
				{
					$tmp_name = $_FILES["fileProfileImage"]["tmp_name"];
					$dosya_adi = $_FILES["fileProfileImage"]["name"];
				// eğer izin varsa yükleniyor.
			
				//$yukle = move_uploaded_file($tmp_name, $uploaddir.$dosya_adi);
				$yukle = move_uploaded_file($tmp_name, $uploaddir."userId_".$userId."_".$date.$uzanti);
				$link_adr =$uploaddir."userId_".$userId."_".$date.$uzanti;
				
				
				
							
				}
				else
				{
					echo "<script language='Javascript'>
				
				alert('Not supported image file.');
				
				</script>";
				
				exit();
				
				header("Location:editProfile.php");
				
				}
				
				// yükleme işi gerçekleşirse db ye yazılıyor.
				
				
				if($yukle)
				{
					$query="update users set profileImageURL='$link_adr' where id=$userId";
					
					$runQuery=mysql_query($query);
				}
			}
			
			$query="update users set firstName='$txbFirstName', lastName='$txbLastName', educationLevelId='$cmbEducationLevel',occupationId='$cmbOccupation' where id=$userId";
			$runQuery=mysql_query($query);
			$_SESSION['userFName']=$txbFirstName;
			$_SESSION['userLName']=$txbLastName;
			if($txbAge!="")
			{
				$query="update users set age='$txbAge' where id=$userId";
				$runQuery=mysql_query($query);
			}
			if($txbTelephone!="")
			{
				$query="update users set phone='$txbTelephone' where id=$userId";
				$runQuery=mysql_query($query);
			}
			if($txbFbUserName!="")
			{
				$query="update users set fbUserName='$txbFbUserName' where id=$userId";
				$runQuery=mysql_query($query);
			}
			if($txbTwUserName!="")
			{
				$query="update users set twUserName='$txbTwUserName' where id=$userId";
				$runQuery=mysql_query($query);
			}
			if($txbAbout!="")
			{
				$query="update users set about='$txbAbout' where id=$userId";
				$runQuery=mysql_query($query);
			}
			$check=false; 
			if ($txbOldPassword!="" && $txbNewPassword1!="" && $txbNewPassword2==$txbNewPassword1) //Pass Oper.
			{
				$query="select password from users where id=$userId";
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
					$userPassword=$fetchQuery["password"];
				$txbOldPassword=md5($txbOldPassword);
				if($userPassword==$txbOldPassword)
				{
					$txbNewPassword1=md5($txbNewPassword1);
					$txbNewPassword2=md5($txbNewPassword2);
					$query="update users set password='$txbNewPassword1' where id=$userId";
					$runQuery=mysql_query($query);
					$check=true;
					
					
				}
				
			}
			
			
			?>
			<section id="main_content">
				<div class="container">
						
					<div class="box_style_1 text-center">
		                    <h4 style="color:green;">Successfull!<i class="icon-ok"></i> </h4>
		                    <p> Your profile was successfully updated.  </p>
		           
			<? if($check==false) 
				
					echo "<meta http-equiv='refresh' content='3; url=myProfile.php'>";
				else if($check==true)
				{
					
				
					echo "<meta http-equiv='refresh' content='3; url=logout.php'>";
					echo "<p>You have to login again. Automatically go to index page.</p>";
					} 
			?>
				       	<p>Schooling Team</p>
		            </div>
				 </div>
			</section>
	
			<?	
			include_once("footer.php"); 
			ob_end_flush();	
			
			
		}
		else
		{
			
			header('Location:editProfile.php');
			
			
		}
	}							
	else //btnEdit
	{
		
		header('Location:editProfile.php');
		
	}
	

	
}
else //userId
{
	
	header('Location:login.php');
	
}

?>

</body>
</html>
