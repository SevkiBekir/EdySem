<? include_once "sessions.php"; 
if($userId!='')
{
?>

<? include_once "header.php"; ?>

<section id="main_content" >
	<div class="container" >

	
			<div class="row">
				<div class="col-md-12">
					<h3 class="col-md-10">If you want to become an instructor</h3>
					<p class="col-md-12">Fill in the blanks please.</p>
				</div>
			</div>
			<form method="post" action="process_applyInstructor.php">
				<div class="row">
					<div class="col-md-6">						
						<div class="form-group">
							<input type="text" name="txbCourseName" class=" form-control" placeholder="Course name " required><span class="input-icon"><i class="icon-book"></i></span>
						</div>
						</div>
					<div class="col-md-6">
						<div class="styled-select">
								<select class="form-control" name="txbCourseCatagory" required>
									<option value="" selected>Select Course Category</option>
									<?
										include_once "connectionDB";
	
										$query="select * from catagories";
										
										$runQuery=mysql_query($query);
										while($fetchQuery=mysql_fetch_array($runQuery))
										{
											$catagoryId=$fetchQuery["id"];
											$catagoryName=$fetchQuery["name"];
											echo "<option value='$catagoryId'>$catagoryName</option>";
											
										}

									?>
								</select>
						</div>
					</div>
							
											
					<div class="col-md-6">
						<div class="form-group">
							<textarea rows="5" name="txbReason" class=" form-control" placeholder="Why do you want to give this course?" style="height:200px;" required></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea rows="5" name="txbInstructorSelf" class=" form-control" placeholder="Tell me yourself briefly?" style="height:200px;" required></textarea>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-push-6 col-md-6" > 
							<div class="form-group">
		                   		<div class="control-label">
		                        	<label class="checkbox">
		                            	<input type="checkbox" name="chbAgreement" value="1"> I agree <a href="termsAndConditions.php">terms and conditions </a>
									</label>
		                          </div>
							</div> 
		                </div>
					</div>
					<div class="row">
						<div class="col-md-push-6 col-md-6">
							<div class="form-group">
								<input type="submit" name="btnApply" value="Apply" class=" btn-lg button_fullwidth"/>
							</div>
						</div>
					</div>
					<!-- end div-->
				</div>
				
			</form>
		
	</div>

</section>

<? include_once "footer.php"; ?>

  </body>
</html>
<?
}
else
{
	header("Location:login.php");
} ?>