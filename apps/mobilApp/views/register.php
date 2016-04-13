<?php
 /**
     * SemTech Co -> E-Learning Project
     * @2016
     * ************ T E A M ************
     * Şevki KOCADAĞ -> bekirsevki@gmail.com
     * Asim Dogan NAMLI -> asim.dogan.namli@gmail.com
     * Okan KAYA -> okankaya93@gmail.com
     * 
     */  
include_once( "sessions.php");

if($userId=='')
{
?>

<?php include_once( "header.php"); ?>

<section id="login_bg">
<div  class="container">
<div class="row">
	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		<div id="login">
			<p class="text-center">
				<img src="<?php assetsUrl(); ?>img/login_logo.png" alt="">
			</p>
			<hr>
			<form method="post" action="register">
           
				<div class="form-group">
							<input type="text" class="form-control" name="rFirstName" placeholder="İsim" required>
                            <span class="input-icon"><i class="icon-user"></i></span>
				</div>
                <div class="form-group inputFormMargin">
							<input type="text" class="form-control inputFormMargin" name="rLastName" placeholder="Soyisim" required>
                            <span class="input-icon"><i class="icon-user"></i></span>
				</div>
       
				<div class="form-group inputFormMargin">
					<input name="rEmail" type="email" class=" form-control inputFormMargin" placeholder="Email" required>
					<span class="input-icon"><i class=" icon-email"></i></span>
				</div>
				<div class="form-group inputFormMargin">
					<input name="rPassword1" type="password" class=" form-control inputFormMargin" placeholder="Şifre" required>
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
                <div class="form-group inputFormMargin">
					<input name="rPassword2" type="password" class=" form-control inputFormMargin" placeholder="Şifre (Yeniden)" required>
					<span class="input-icon"><i class="icon-lock"></i></span>
				</div>
				<div class="form-group inputFormMargin">
					<input name="btnRegister" value="Kayıt Ol" type="submit" class="button_fullwidth">
				
				</div>
				
                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
                <a href="login" class="button_fullwidth-2">Giriş</a>
			</form>
		</div>
	</div>
</div>
</div>
</section> <!-- End login -->

  

<?php include_once( "footer.php");
}
else{
	//Go back to Index
	header('Location: '.get_instance()->config->base_url('',NULL));
}
	
?>