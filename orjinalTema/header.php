<?php 
include_once("sessions.php");
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">

<head>
  	<meta charset="utf-8">
    <title>Schooling - Just like School</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/superfish.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/single_course.css">
     <!-- color scheme css -->
    <link href="css/color_scheme.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head>
  
  <body>
    <header>
  	<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<a href="index.php" id="logo">Schooling</a>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<div class=" pull-right">
			<?php if($userId!=""){?>
            	<div class="row">
                	<div class="gggcol-xs-offset-2"></div>
                	<div class="col-xs-4 pull-right">
                	<?php 	include_once "connectionDB.php" ;
	                	$querySearch="select id,profileImageURL from users where id='$userId'";
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
		                	$userImageProfileURL=$fetchQuery["profileImageURL"];
	                	}
                	?>
                        <img class="img-circle img-responsive" style="width:50px;height:50px;" src="<?php  echo $userImageProfileURL; ?>" alt="">
                        </div>
                        <div class="col-xs-4 col-xs-push-1 hpull-right">
                        <div class="btn-group">
                        
						
                          <a class="btn dropdown-toggle hProfileDropDown" data-toggle="dropdown" href="#">
                            <?php echo $userFName." ".$userLName; ?>
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a  href="myProfile.php"><span class=" icon-cog"></span> My Dashboard</a></li>
                            <li><a  href="logout.php"><span class="icon-logout"></span> Log Out</a></li>
                          </ul>
                        </div>
                     </div>
                 </div>
                
                
				 	<?php }
				 	else if($userId==""){?>
                <a href="login.php" class="button_top" id="login_top2">Login</a>
                <a href="applyInstructor.php" class="button_top hidden-xs" id="apply">Become Instructor</a></div>
                <ul id="top_nav" class="hidden-xs">
                    <li><a href="aboutUs.php">About</a></li>
                   
                    <li><a href="register.php">Register</a></li>
                </ul>
                <?php }?>
            <!-- end pull-right-->
		</div>
	</div>
</div>
</header><!-- End header -->

<nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div id="mobnav-btn"></div>
			<ul class="sf-menu">
				<li><a href="index.php">Home</a></li>
                <li><a href="courseList.php">Courses</a></li>
				<?php if($userId!=""){ ?>
                <li class="mega_drop_down">
				<a href="#">My Profile</a>
                <div class="mobnav-subarrow"></div>
                <div class="sf-mega">
                	<div class="col-md-4 col-sm-6">
                    	<h5>Profile Information</h5>
                            <ul class="mega_submenu">
                            	
                                <li style="margin-top:10%">
                                <?php 	include_once("connectionDB.php");
			                	$querySearch="select id,profileImageURL from users where id='$userId'";
			                	$runQuery=mysql_query($querySearch);
			                	while($fetchQuery=mysql_fetch_array($runQuery))
			                	{
				                	$userImageProfileURL=$fetchQuery["profileImageURL"];
			                	}
								?>
                                <center><img class="img-rounded " style="width:120px;height:120px;" src="<?php  echo $userImageProfileURL; ?>" alt="" /></center>
                                <p> <h4 class="text-center"><?php echo $userFName." ".$userLName; ?></h4>
                                </p>
                                <a href="myProfile.php" class="text-center">Go to Profile Details</a>
                                
                                </li>
                            </ul>
                    </div>
                  <div class="col-md-8 col-sm-6">
                   <h5>My Courses</h5>
                          <ul class="mega_submenu">
                          		<?php 	include_once("connectionDB.php");
			                	$querySearch="select courseId from courseToUser where userId='$userId'";
			                	$runQuery=mysql_query($querySearch);
			                	$count=0;
			                	while($fetchQuery=mysql_fetch_array($runQuery))
			                	{
			                		$count++;
				                	$courseId=$fetchQuery["courseId"];
				                	$queryCourseInfo="select c.name, cD.ImageURL from courses c inner join courseDetails cD on c.id=cD.courseId where c.id=$courseId";
				                	$runQueryCI=mysql_query($queryCourseInfo);
				                	while($fetchQueryCI=mysql_fetch_array($runQueryCI))
				                	{
					                	$courseName=$fetchQueryCI["name"];
					                	$courseImageURL=$fetchQueryCI["ImageURL"];
				                	}
									$queryX="select count(*) as OK from lessons where courseId=$courseId";
				        			$runQueryX=mysql_query($queryX);
				        			while($fetchQueryX=mysql_fetch_array($runQueryX))
				        				$countLesson=$fetchQueryX["OK"];
									$queryX="select count(*) as OK from lessonProgress lP inner join lessons l on l.id=lP.lessonId  where lP.userId=$userId and lP.lessonLegendId=2 and l.courseId=$courseId";
				        			$runQueryX=mysql_query($queryX);
				        			while($fetchQueryX=mysql_fetch_array($runQueryX))
				        				 $countCompleted=$fetchQueryX["OK"];
				        			
				        			$percentage=(100*$countCompleted)/$countLesson;
								?>
                          
                           	  <li>
                                <div class="row">
                                	<div class="col-xs-4">
                                    
                                        <div class="photo">
                                           <img class="img-rounded" style="width:160px;height:120px;" src="<?php echo $courseImageURL; ?>" alt="" />
                                           
                                        </div>
                                     </div>
                                     <div class="col-xs-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                            	<div class="course_info text-center"><a href="<?php echo "course.php?courseId=".$courseId; ?>"><?php echo  $courseName; ?></a></div>
                                                <span>You complete <strong><?php echo $countCompleted; ?></strong> out of <strong><?php echo $countLesson; ?></strong> lessons</span><span id="end"><i class="icon-trophy"></i></span>
				                                <div class="progress">
				                                    <div class="progress-bar progress-bar-info" role="progressbar" data-percentage="<?php echo $percentage; ?>"></div>
				                                </div>

                                            </div>
                                        </div><!-- End progress bar -->
                                         
                                            
                                        <!-- end col-xs-8 -->
                                    </div>
                                <!-- end row -->
                             </div>
                             </li>
                             
                             <?php
                             	} 
							 	if($count==0)
							 		{
							?>
							
							<li>
								<div class="row">
                                            <div class="col-md-12">
                                            	<div class="course_info text-center">
                                            		<h4> You have no course. :(</h4>
                                            	</div>
                                            </div>
								</div>
							</li>	 		
							<?php	 		
							 		}
                             ?>
                             
                            
                          </ul>
                    </div>
                    
                </div>
                </li>
                <?php }?>
				<li><a href="contact.php">Contact</a></li>
			</ul>
            
            <div class="col-md-3 pull-right hidden-sm hidden-xs">
                    <div id="sb-search" class="sb-search">
						<form method="get" action="courseList.php">
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
              </div><!-- End search -->
              
		</div>
	</div><!-- End row -->
</div><!-- End container -->
</nav>