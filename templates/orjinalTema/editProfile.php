<?php 
include_once "sessions.php";

if($userId!="")
{

	include_once "header.php";
	include_once "connectionDB";
	$query="select u.firstName,u.lastName,u.age,eL.name as eduName, o.name as occuName, u.phone, u.fbUserName,u.twUserName,u.about,u.profileImageURL,u.email, uT.name as type, u.educationLevelId as edId, u.occupationId as occuId from users u join occupations o on o.id=u.occupationId join educationLevels eL on eL.id=u.educationLevelId join userTypes uT on uT.id=u.typeId where u.id=$userId";
	$runQuery=mysql_query($query);
	while($fetchQuery=mysql_fetch_array($runQuery))
	{
		$userFName=$fetchQuery["firstName"];
		$userLName=$fetchQuery["lastName"];
		$userAge=$fetchQuery["age"];
		$userEduName=$fetchQuery["eduName"];
		$userOccuName=$fetchQuery["occuName"];
		$userPhone=$fetchQuery["phone"];
		$userFbUserName=$fetchQuery["fbUserName"];
		$userTwUserName=$fetchQuery["twUserName"];
		$userAbout=$fetchQuery["about"];
		$userProfileImageURL=$fetchQuery["profileImageURL"];
		$userEmail=$fetchQuery["email"];
		$userType=$fetchQuery["type"];
		$userEduId=$fetchQuery["edId"];
		$userOccuId=$fetchQuery["occuId"];
	}
	
	$query="select count(*) as OK from courseToUser where userId=$userId";
	$runQuery=mysql_query($query);
	while($fetchQuery=mysql_fetch_array($runQuery))
		$totalCourse=$fetchQuery["OK"];

	
?>
<section id="main_content">

	<div class="container">
	      <div class="row">
		     <aside class="col-md-12">
		     	<div class=" box_style_1 profile">
		     		<form method="post" enctype="multipart/form-data" action="process_editProfile.php">
		     			<div class="row">
		     				<div class="col-md-6">
		     				
				 				<p class="text-center">
					 				<img style="width:200px;height:200px;" src="<?php echo $userProfileImageURL; ?>" alt="Teacher" class="img-circle styled">
					 			</p>
		     				</div>
		     				
			 				<div class="col-md-6">
		     						<div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
					 				<div class="input-group formSetting">     
									 	<span class="input-group-addon formSetting-adon">Upload Profile Image</span>
									 	<input name="fileProfileImage" type="file" class="form-control" placeholder="Upload Profile Image"/>
									</div>
									<p style="color:red;" class="text-center"> Only .jpg and .jpeg file extensions are supported.</p>		
		     				</div>
		     				
		     			</div>
						 
			            <ul>
		                	<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Name</span>
								 	<input name="txbFirstName" type="text" class="form-control" placeholder="First Name" value="<?php echo $userFName; ?>"  required="true" />
								 	<input name="txbLastName"  type="text" class="form-control" placeholder="Last Name" value="<?php echo $userLName; ?>" required="true"/>

								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Email</span>
								 	<input name="txbEmail" type="text" class="form-control" placeholder="Email" value="<?php echo $userEmail; ?>" readonly/>
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Password</span>
								 	<input name="txbOldPassword" type="password" class="form-control" placeholder="If you change your password write old Password"/>
								 	<input name="txbNewPassword1" type="password" class="form-control" placeholder="If you change your password write new Password"/>
								 	<input name="txbNewPassword2" type="password" class="form-control" placeholder="If you change your password write new Password (Again)"/>


								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Age</span>
								 	<input name="txbAge" type="text" class="form-control" placeholder="Your Age" value="<?php if($userAge!='-') echo $userAge; ?>" />
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Education Level</span>
								 	<select class="form-control" name="cmbEducationLevel" required="true" >
								 	<?php 
									 	
									 
				                    $query="select * from educationLevels ";
									$runQuery=mysql_query($query);
									while($fetchQuery=mysql_fetch_array($runQuery))
									{
										$edId=$fetchQuery["id"];
										$edName=$fetchQuery["name"];
										echo "<option value='$edId'";
										if($userEduId==$edId)
											echo "selected";
										echo ">$edName</option>";
										
									}
										
			                    
		                    ?>
							
								 	</select>
								 	
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Occupation</span>
								 	<select class="form-control" name="cmbOccupation" required="true">
								 	<?php 
									 	
									 
				                    $query="select * from occupations ";
									$runQuery=mysql_query($query);
									while($fetchQuery=mysql_fetch_array($runQuery))
									{
										$edId=$fetchQuery["id"];
										$edName=$fetchQuery["name"];
										echo "<option value='$edId'";
										if($userOccuId==$edId)
											echo "selected";
										echo ">$edName</option>";
										
									}
										
			                    
		                    ?>
							
								 	</select>
								 	
								 </div>		                      
							</li>
		                    <li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">Telephone</span>
								 	<input name="txbTelephone" type="text" class="form-control" placeholder="Your Telephone" value="<?php if($userPhone!='-') echo $userPhone; ?>" />
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">facebook.com/</span>
								 	<input name="txbFbUserName" type="text" class="form-control" placeholder="Facebook Username" value="<?php if($userFbUserName!=null) echo $userFbUserName; ?>" />
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">twitter.com/</span>
								 	<input name="txbTwUserName" type="text" class="form-control" placeholder="Twitter Username" value="<?php if($userTwUserName!=null) echo $userTwUserName; ?>" />
								 </div>		                      
							</li>
							<li>
		                     	<div class="input-group formSetting">     
								 	<span class="input-group-addon formSetting-adon">About</span>
								 	<textarea name="txbAbout" style="height:200px;" class="form-control" placeholder="About of You"><?php if($userAbout!='-') echo $userAbout; ?>" </textarea>
								 </div>		                      
							</li>
		                    <li>
		                    	<div class="row">
				     				<div class="col-md-6">
				     				
						 				<a href="myProfile.php" class="btn-lg button_fullwidth-2">Back to My profile</a>								 			
				     				</div>
				     				
					 				<div class="col-md-6">
				     					<input type="submit" name="btnEdit" value="Edit" class=" btn-lg button_fullwidth"/>		
				     				</div>
				     				
				     			</div>
                    
							</li>

			            </ul>
		     		</form>
		              
				</div><!-- End box-sidebar -->
	     </aside><!-- End aside -->
	 
	</div><!-- End container -->
</section><!-- End main_content-->


<?php include_once "footer.php"; ?>

  </body>
</html>
<?php 
}
else
{
	//header("Location:login.php");
	echo "deneme";
	}
?>