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
			<form method="post" action="process_registration.php">
           
				<div class="form-group">
							<input type="text" class="form-control" name="rFirstName" placeholder="First Name">
                            <span class="input-icon"><i class="icon-user"></i></span>
				</div>
                <div class="form-group inputFormMargin">
							<input type="text" class="form-control inputFormMargin" name="rLastName" placeholder="Last Name">
                            <span class="input-icon"><i class="icon-user"></i></span>
				</div>
       
				<div class="form-group inputFormMargin">
					<input name="rEmail" type="email" class=" form-control inputFormMargin" placeholder="Email">
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				<div class="form-group inputFormMargin">
					<input name="rPassword1" type="password" class=" form-control inputFormMargin" placeholder="Password">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
                <div class="form-group inputFormMargin">
					<input name="rPassword2" type="password" class=" form-control inputFormMargin" placeholder="Password (Again)">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				<div class="form-group inputFormMargin">
					<input name="btnRegister" value="Register" type="submit" class="button_fullwidth">
				
				</div>
				
                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
                <a href="login.php" class="button_fullwidth-2">LogIn</a>
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