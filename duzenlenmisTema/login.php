<?php 
include_once( "sessions.php");

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
				<img src="<?php assetsUrl(); ?>img/login_logo.png" alt="">
			</p>
			<hr>
			<form method="post" action="process_login.php">
           
			
       
				<div class="form-group">
					<input name="lEmail" type="email" class=" form-control " placeholder="Email">
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				<div class="form-group" style="margin-bottom:5px;">
					<input name="lPassword" type="password" class=" form-control" placeholder="Password" style="margin-bottom:5px;">
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				<p class="small">
					<a href="forgettenPassword">Forgot Password?</a>
				</p>
				<div class="form-group" style="margin-bottom:5px;">
					<input name="btnLogin" type="submit" value="Login" class="button_fullwidth" style=" margin-bottom:5px;">
				</div>
				
                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
				<a href="register" class="button_fullwidth-2">RegIster</a>
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