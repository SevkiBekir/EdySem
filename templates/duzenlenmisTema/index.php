<?php 
    include "header.php";
    include_once "sessions.php";
    
if($userId==""){ 

?>
<section id="sub-header" >
  	<div class="container">
    	<div class="row">
        	<div class="col-md-6" id="subscribe">
           
            	<h1>To Learn Something New</h1>
                <h2 class="hidden-xs">Let's start to learn by using login or register</h2>
            </div>
            
            <div class="col-md-6 ">
            <div class="subscribe_home">
            	
            	<form method="post" action="process_login.php" >
	           		<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<input type="email" class="form-control style_2" name="lEmail" placeholder="Email">
	                            <span class="input-icon"><i class="icon-email"></i></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<input type="password" class="form-control style_2" name="lPassword" placeholder="Password">
	                            <span class="input-icon"><i class="icon-lock"></i></span>
							</div>
						</div>
	                    <div class="col-md-12">
							<div class="form-group">
								 <input type="submit" name="btnLogin" value="Login" class="btn-lg button_fullwidth">
						</div>
	                    <!-- end row -->
					</div>
                </form>
			</div>
           	<div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
			<form method="post" action="process_registration.php">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control style_2" name="rFirstName" placeholder="First Name">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control style_2" name="rLastName" placeholder="Last Name">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="email" name="rEmail" class="form-control style_2" placeholder="Email">
                            <span class="input-icon"><i class="icon-email"></i></span>
						</div>
					</div>
					
				</div>
          		<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="password" class="form-control style_2" name="rPassword1" placeholder="Password">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="password" class="form-control style_2" name="rPassword2" placeholder="Password (Again)">
                            <span class="input-icon"><i class="icon-user"></i></span>
						</div>
					</div>
				</div>
                
                <div class="row">
                        
                    <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" name="btnRegister" value="Register" class="btn-lg button_fullwidth">
                                
                        </div>
                    </div>
                </div>
                </div>
                </form>
            </div>
            </div>
        </div><!-- End row -->
    </div>
  </section><!-- End sub-header -->
<?php  }
	else if($userId!=""){
?>
	<section id="sub-header" >
  	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<h1>Our Intro Video</h1>
                <h2>Schooling helps you to</h2>
                <ul class="list_ok h4">
                    <li><strong>Learn</strong> new thing</li>
                    <li><strong>Become</strong>  an expert</li>
                    <li><strong>Gain</strong> money</li>
                    
                </ul>
            </div>
            <div class="col-md-6 video">
            	<iframe style="width:550px;height:315px;" src="<?php assetsUrl(); ?>https://www.youtube.com/embed/vRAgOfvIxlE" frameborder="0" allowfullscreen></iframe>
            </div>
        </div><!-- End row -->
    </div>
  </section><!-- End sub-header -->		
<?php		
	}
?>
    
    <section id="main-features">
    <div class="divider_top_black"></div>
    <div class="container">
        <div class="row">
            <div class=" col-md-10 col-md-offset-1 text-center">
                <h2>Why Join Schooling</h2>
                <p class="lead">
                    More expert teachers, trusted certifications, thousands of audio and video lessons. Having all of them in one's pocket. <br>
                    
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="feature">
                    <i class="icon-trophy"></i>
                    <h3>Expert teachers</h3>
                    <p>
                       The best teachers are from around the world.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <i class=" icon-ok-4"></i>
                    <h3>Trusted payment</h3>
                    <p>
                        Secure and easy payment. Your money is safe with us.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <i class="icon-user"></i>
                    <h3> +1000 students</h3>
                    <p>
						There are thousands students from around the world
                         </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <i class="icon-video"></i>
                    <h3>+100 Video lessons</h3>
                    <p>
                        Hundreds video are in your pockets. Watch them wherever you are and whenever you want on tablet or phone </p>
                </div>
            </div>
            </div><!-- End row -->
            </div><!-- End container -->
    </section><!-- End main-features -->
    
    <section id="main_content_gray">
    	<div class="container">
        	<div class="row">
            <div class="col-md-12 text-center">
                <h2>Popular Courses</h2>
                
            </div>
        </div><!-- End row -->
        
        <div class="row">
        			
        			<?php 	
                        include_once("connectionDB.php");
	                	$querySearch="select c.id,c.name,cD.summary,c.catagoryId,cD.ImageURL,c.price from courses c inner join courseDetails cD on c.id=cD.courseId";
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
	                		$courseName=$fetchQuery["name"];
	                		$courseId=$fetchQuery["id"];
	                		$courseSummary=$fetchQuery["summary"];
	                		$catagoryId=$fetchQuery["catagoryId"];
		                	$courseImageURL=$fetchQuery["ImageURL"];
		                	$coursePrice=$fetchQuery["price"];
		                	
		                	
		                	
		                	$timeDiffQuery="SELECT DATEDIFF(NOW(),c.date) AS days,c.date,c.id from courses c where c.id=$courseId";
		                	$runQueryTimeDiff=mysql_query($timeDiffQuery);
		                	while($fetchTimeDiffQuery=mysql_fetch_row($runQueryTimeDiff))
		                	{
								$timeDiff=$fetchTimeDiffQuery[0];
							}
		                	
		            ?>
		            <div class="col-lg-3 col-md-6 col-sm-6">
                    	<div class="col-item">
                            
                                <div class="photo">
                                    <a href="#"><img src="<?php assetsUrl(); ?><?php echo $courseImageURL; ?>" alt="" /></a>
                                    <?php
                                        $query="select * from catagories where id=$catagoryId";
                                        $runQueryNew=mysql_query($query);
                                        while($fetchQueryNew=mysql_fetch_array($runQueryNew))
                                        {
                                            $catagoryName=$fetchQueryNew["name"];
                                        }
                                     ?>
                                    <div class="cat_row"><a href=" <?php assetsUrl(); ?><?php echo "courseList.php?catagoryId=$catagoryId"; ?>"><?php echo  $catagoryName; ?></a><span class="pull-right"><i class=" icon-clock"></i><?php echo $timeDiff. " days ago"; ?></span></div>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="course_info col-md-12 col-sm-12">
                                            <h4> <?php echo  $courseName; ?></h4>
                                            <p > <?php echo  $courseSummary; ?> </p>
                                            <div class="price text-center"><?php echo $coursePrice; ?></div> 
                                        </div>
                                    </div>
                                    <div class="separator clearfix">
                                        
                                        <p > <a href=" <?php assetsUrl(); ?><?php echo "course.php?courseId=$courseId" ?>"><i class=" icon-list"></i> Details</a></p>
                                    </div>
                                </div>
                           </div>
                        </div>
		            
		            
		            <?php
		                	
	                	}
                	?>
        			 
        			        </div><!-- End row -->
        <div class="row">
        	<div class="col-md-12">
        	     <a href="courseList" class="button_medium_outline pull-right">View all courses</a>
            </div>
        </div>
         </div>   <!-- End container -->
        </section><!-- End section gray -->
        
        
    
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class='col-md-offset-2 col-md-8 text-center'>
                    <h2>What they say</h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-offset-2 col-md-8'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-circle" src="<?php assetsUrl(); ?>img/sevki.jpg" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <p>
                                               One of the best in life is to LEARN NEW THING
                                            </p>
                                            <small>Şevki Bekir Kocadağ</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
       </section><!-- End testimonials -->

<?php include "footer.php"; ?>

  </body>
</html>