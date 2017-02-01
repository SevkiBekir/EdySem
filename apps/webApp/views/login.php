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

if($username==''){
	include_once("header.php"); ?>

	<section id="login_bg">
	<div  class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div id="login">
				<p class="text-center">
					<img src="<?php assetsUrl('img/login_logo.png'); ?>" alt="">
				</p>
				<hr>
				<form method="post" action="login">
	           
				
	       
					<div class="form-group">
						<input name="lEmail" type="email" class=" form-control " placeholder="Email">
						<span class="input-icon"><i class=" icon-email" required></i></span>
					</div>
					<div class="form-group" style="margin-bottom:5px;">
						<input name="lPassword" type="password" class=" form-control" placeholder="Şifre" style="margin-bottom:5px;" required>
						<span class="input-icon"><i class="icon-lock"></i></span>
					</div>
					<p class="small">
						<a href="forgettenPassword">Şifremi Unuttum</a>
					</p>
					<div class="form-group" style="margin-bottom:5px;">
						<input name="btnLogin" type="submit" value="Giriş" class="button_fullwidth" style=" margin-bottom:5px;" >
					</div>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none;"/>
					
	                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
					<a href="<?php baseUrl(1,'register') ?>" class="button_fullwidth-2">Kayıt Ol</a>
				</form>
			</div>
		</div>
	</div>
	</div>
	</section> <!-- End login -->
	
	  
<?php include_once("footer.php") ;
}
else{
	 // Go back to Index
	 headerLocation();
	 
}
	
?>