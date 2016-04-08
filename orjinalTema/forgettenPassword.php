<?php 
include "sessions.php";

if($userId=='')
{
?>

<?php include "header.php"; ?>

<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="img/login_logo.png" alt="">
			</p>
			<hr>
			<form method="post" action="process_forgettenPassword.php">
           
			
       
				<div class="form-group">
					<input name="txbEmail" type="email" class=" form-control " placeholder="Email">
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				
				
				<div class="form-group" style="margin-bottom:5px;">
					<input name="btnFP" type="submit" value="Create New Password" class="button_fullwidth" style=" margin-bottom:5px;">
				</div>
				
                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
				<a href="login.php" class="button_fullwidth-2">Cancel</a>
			</form>
		</div>
	</div>
</div>
</div>
</section> <!-- End login -->

  

<?php include "footer.php"; ?>

  </body>
</html>
<?php 
}
else{

	header('Location:index.php');
}
	
?>