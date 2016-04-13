<?php 

include_once "sessions.php";
$getCourseId="";
$getCourseId=$_GET['courseId'];

if($getCourseId=="" || $userId=="")
	header("Location:courseList.php");

include "header.php"; ?>


<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1>Payment</h1>
                
            </div>
        </div><!-- End row -->
        
       
    </div><!-- End container -->
    <div class="divider_top"></div>
  </section>
  <?php 
	include_once "connectionDB.php";
	$query="select name,price from courses where id=$getCourseId";
	$query=mysql_real_escape_string($query);
	$runQuery=mysql_query($query);
	while($fetchQuery=mysql_fetch_array($runQuery))
	{
		$courseName=$fetchQuery["name"];
		$coursePrice=$fetchQuery["price"];
	}
  ?>
  
  <section id="main_content">
  <div class="container">
  
  <ol class="breadcrumb">
  		<li> <a href="courseList">All Courses</a></li>
      <li><a href=" <?php assetsUrl(); ?><?php echo "course.php?courseId=$getCourseId"; ?>"><?php echo $courseName; ?></a></li>
      <li class="active">Payment</li>
    </ol>

	 <div class="row">
     		<div class="col-md-4">
                <div class="plan text-center">
                	
                
                        <h2 class="plan-title"><?php echo $courseName; ?></h2>
                        <p class="plan-price"><?php echo $coursePrice; ?></p>
                        
                        
                	
                </div>    
                    
                
            </div><!-- End col-md-4  -->
            <div class="col-md-8" style="margin-top:10px;">
            	<form method="post" action="process_payment.php">
            		<div class="form-group">
                        <input name="txbCCOwnerFLName" type="text" class=" form-control " placeholder="Credit Card's Owner Name and Surname" required>
                        <span class="input-icon"><i class=" icon-profile"></i></span>
					</div>
                	<div class="form-group">
                        <input name="txbCCNo" type="text" class=" form-control " placeholder="Credit Card No" required>
                        <span class="input-icon"><i class=" icon-credit-card-3"></i></span>
					</div>
                    <div class="row">
                    	<div class="col-md-6">
                            <div class="form-group">
                                <input name="txbCCSecurityNo" type="password" class=" form-control " placeholder="Credit Card  Security No" required>
                                <span class="input-icon"><i class=" icon-credit-card-1"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                        	<div class="form-group">
                        		<div class="styled-select">
									<select class="form-control" name="cmbCCMonth" required>
										<option value="S" selected>Select Month</option>
									<?php
											for($i=1;$i<=12;$i++)
												echo "<option value='$i'>$i</option>";
									?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
	                        	<div class="styled-select">
									<select class="form-control" name="cmbCCYear" required>
										<option value="S" selected>Select Year</option>
										<?php
												for($i=2015;$i<=2023;$i++)
													echo "<option value='$i'>$i</option>";
										?>
									</select>
								</div>
							</div>
						</div>
						<?php $_SESSION['paymentId']=$getCourseId; ?>                            
                   </div><!-- End row -->
                   <div class="form-group">
                   		<div class="control-label">
                          <label class="checkbox">
                              <input type="checkbox" name="chbAgreement" value="1"> I agree <a href="termsAndConditions" required>terms and conditions </a>
                          </label>
                          </div>
                   </div> 
                   <div class="row">
                    	<div class="col-md-6">
                            <div class="form-group">
                            	<a href=" <?php assetsUrl(); ?><?php echo "course.php?courseId=$getCourseId"; ?>" class="form-control btn-lg button_fullwidth-2"> Back to Course </a>    
                            </div> 
                       	</div>
                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="btnPayment" type="submit" class="btn-lg button_fullwidth button_subscribe_green " value="Buy it">
                         </div>
                   </div><!-- End row -->
                   
                </form>
            </div>
            
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>
  

<?php include "footer.php"; ?>

  </body>
</html>