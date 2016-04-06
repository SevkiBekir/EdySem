<? 
include_once "sessions.php";

if($userId!="")
{

	include_once "header.php";
	include_once "connectionDB";
	$query="select u.firstName,u.lastName,u.age,eL.name as eduName, o.name as occuName, u.phone, u.fbUserName,u.twUserName,u.about,u.profileImageURL,u.email, uT.name as type from users u join occupations o on o.id=u.occupationId join educationLevels eL on eL.id=u.educationLevelId join userTypes uT on uT.id=u.typeId where u.id=$userId";
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
	}
	
	$query="select count(*) as OK from courseToUser where userId=$userId";
	$runQuery=mysql_query($query);
	while($fetchQuery=mysql_fetch_array($runQuery))
		$totalCourse=$fetchQuery["OK"];

	
?>
<section id="main_content">

<div class="container">
      <div class="row">
     <aside class="col-md-4">
     	<div class=" box_style_1 profile">
		<p class="text-center"><img style="width:200px;height:200px;" src="<? echo $userProfileImageURL; ?>" alt="Teacher" class="img-circle styled"></p>
        		  <ul class="social_teacher">
        		  <?
                    if($userFbUserName!=null)
                       echo "<li><a href='https://www.facebook.com/$userFbUserName' target='_blank'><i class='icon-facebook'></i></a></li>";
                    if($userTwUserName!=null)
                       echo "<li><a href='https://www.twitter.com/$userTwUserName' target='_blank'><i class='icon-twitter'></i></a></li>";
                       ?>

                    
                </ul>   
                 <ul>
                     <li>Name <strong class="pull-right"><? echo $userFName." ".$userLName; ?></strong> </li>
                     <li>Email <strong class="pull-right"><? echo $userEmail; ?></strong></li>
                     <li>Age<strong class="pull-right"><? echo $userAge; ?></strong></li>
                     <li>Education Level<strong class="pull-right"><? echo $userEduName; ?></strong></li>
                     <li>Occupation<strong class="pull-right"><? echo $userOccuName; ?></strong></li>
                     <li>Telephone  <strong class="pull-right"><? echo $userPhone; ?></strong></li> 
                     <li>Courses <strong class="pull-right"><? echo $totalCourse; ?></strong></li>
                     <li>Membership Type<strong class="pull-right"><? echo $userType; ?></strong></li>
                     <a href="editProfile.php" class="button_fullwidth btn-lg">EDIT YOUR PROFILE</a>
                </ul>
              
			</div><!-- End box-sidebar -->
     </aside><!-- End aside -->
     
     <div class="col-md-8">
     
     			<!--  Tabs -->   
                    <ul class="nav nav-tabs" id="mytabs">
                        <li class="active"><a href="#profile_teacher" data-toggle="tab">Profile</a></li>
                        <li><a href="#courses" data-toggle="tab">My Courses as Student</a></li>
                        <? if($userType=="Instructor" || $userType=="Admin")
					   { ?>
                        <li><a href="#myGivingCourses" data-toggle="tab">My Courses as Instructor</a></li>
                        <li><a href="#myDashboard" data-toggle="tab">My Dashboard</a></li>
                        <?}?>
                    </ul>
                    
                     <div class="tab-content">
                    
                        <div class="tab-pane fade in active" id="profile_teacher">
                            <h3>About me</h3>
                            <? echo $userAbout; ?>
						</div>
                       
                       <div class="tab-pane fade in" id="courses">
                       			
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead >
                                      <tr >
                                        <th>Category</th>
                                        <th>Course name</th>
                                        <th>Lessons</th>
                                        <th>Progress</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    	$count=0;
                                    	$query="select c.id ,ca.name as catagoryName, c.name as courseName from courses c join courseToUser cT on cT.courseId=c.id join catagories ca on ca.id=c.catagoryId  where cT.userId=$userId order by catagoryName asc, courseName asc";
										$runQuery=mysql_query($query);
										while($fetchQuery=mysql_fetch_array($runQuery))
										{
											$courseId=$fetchQuery["id"];
											$catagoryName=$fetchQuery["catagoryName"];
											$courseName=$fetchQuery["courseName"];
											
											$queryX="select count(*) as OK from lessons where courseId=$courseId";
						        			$runQueryX=mysql_query($queryX);
						        			while($fetchQueryX=mysql_fetch_array($runQueryX))
						        				$countLesson=$fetchQueryX["OK"];
											$queryX="select count(*) as OK from lessonProgress lP inner join lessons l on l.id=lP.lessonId  where lP.userId=$userId and lP.lessonLegendId=2 and l.courseId=$courseId";
						        			$runQueryX=mysql_query($queryX);
						        			while($fetchQueryX=mysql_fetch_array($runQueryX))
						        				 $countCompleted=$fetchQueryX["OK"];
						        			
						        			$percentage=(100*$countCompleted)/$countLesson;
											$count++;
										
                                    ?>
                                      <tr>
                                        <td><? echo  $catagoryName;?></td>
                                        <td><a href="course.php?courseId=<? echo $courseId; ?>"><? echo $courseName;?></a></td>
                                        <td><? echo $countLesson; ?></td>
                                        <td class="rating_2">
                                        	<div class="progress">
                                                        <div class="progress-bar progress-bar-info myProgressBar" role="progressbar" data-percentage="<? echo $percentage; ?>"></div>
                                             </div>
                                        </td>
                                      </tr>
                                      <?
                                      	}
                                      	
                                      ?>
                                                                           
                                    </tbody>
                                  </table>
                                  <? if($count==0) echo "No course :("; ?>
                                  </div>
                       </div><!-- End tab-pane -->
                       <? if($userType=="Instructor" || $userType=="Admin")
					   		{ 
						   
					   ?>
                       <div class="tab-pane fade in" id="myGivingCourses">
                       			
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Category</th>
                                        <th>Course name</th>
                                        <th>Lessons</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    	$countIns=0;
                                    	$query="select c.id ,ca.name as catagoryName, c.name as courseName from courses c  join catagories ca on ca.id=c.catagoryId  where c.teacherId=$userId order by catagoryName asc, courseName asc";
										$runQuery=mysql_query($query);
										while($fetchQuery=mysql_fetch_array($runQuery))
										{
											$courseId=$fetchQuery["id"];
											$catagoryName=$fetchQuery["catagoryName"];
											$courseName=$fetchQuery["courseName"];
										
											$queryX="select count(*) as OK from lessons where courseId=$courseId";
						        			$runQueryX=mysql_query($queryX);
						        			while($fetchQueryX=mysql_fetch_array($runQueryX))
						        				$countLesson=$fetchQueryX["OK"];
						        			$countIns++;
                                    ?>
                                      <tr>
                                       	<td><? echo  $catagoryName;?></td>
                                        <td><a href="course.php?courseId=<? echo $courseId; ?>"><? echo $courseName;?></a></td>
                                        <td><? echo $countLesson; ?></td>
                                        
                                      </tr>
                                     <?
                                     	}
                                     	
                                     ?>                                        
                                     
                                    </tbody>
                                  </table>
                                   <? if($countIns==0) echo "No course :("; ?>
                                  </div>
                       </div><!-- End tab-pane -->
                       
                        <div class="tab-pane fade in" id="myDashboard">
                       			
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Process Name</th>
                                        <th>Description</th>
                                        
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><a href="#">Add a course</a></td>
                                        <td>This process is about adding a new course</td>
                                       </tr>
                                       <tr>
                                        <td><a href="#">Update your course/s</a></td>
                                        <td>You can edit your course/s and also delele it.</td>
                                       </tr>
                                       <? 
									   
									   if($userType=="Admin")
									   {   
									   ?>
                                       <tr>
                                        <td><a href="#">Approve/Deny Course</a></td>
                                        <td>You can approve or deny a course. Course status also included.</td>
                                       </tr>
                                       <?
									   }
									   
									   ?>
                                     
                                    </tbody>
                                  </table>
                                  </div>
                       </div><!-- End tab-pane -->
                     <? }?>  
                       
                  </div>   <!-- End content-->              
		
     </div><!-- End col-md-8-->   	
  </div><!-- End row-->   
</div><!-- End container -->
</section><!-- End main_content-->


<? include_once "footer.php"; ?>

  </body>
</html>
<? 
}
else
{
	header("Location:login.php");
	
	}
?>