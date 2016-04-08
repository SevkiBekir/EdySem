<?php 
include_once "sessions.php";

if($userId!="")
{
	$getUserId=$_GET['userId'];
	if($getUserId!="")
	{
		include_once "header.php";
		include_once "connectionDB";
		$query="select u.firstName,u.lastName,u.age,eL.name as eduName, o.name as occuName, u.phone, u.fbUserName,u.twUserName,u.about,u.profileImageURL,u.email, uT.name as type from users u join occupations o on o.id=u.occupationId join educationLevels eL on eL.id=u.educationLevelId join userTypes uT on uT.id=u.typeId where u.id=$getUserId";
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
		
		$query="select count(*) as OK from courseToUser where userId=$getUserId";
		$runQuery=mysql_query($query);
		while($fetchQuery=mysql_fetch_array($runQuery))
			$totalCourse=$fetchQuery["OK"];

	
	
?>
<section id="main_content">

<div class="container">
      <div class="row">
     <aside class="col-md-4">
     	<div class=" box_style_1 profile">
		<p class="text-center"><img style="width:200px;height:200px;" src="<?php echo $userProfileImageURL; ?>" alt="Teacher" class="img-circle styled"></p>
        		  <ul class="social_teacher">
        		  <?php
                    if($userFbUserName!=null)
                       echo "<li><a href='https://www.facebook.com/$userFbUserName' target='_blank'><i class='icon-facebook'></i></a></li>";
                    if($userTwUserName!=null)
                       echo "<li><a href='https://www.twitter.com/$userTwUserName' target='_blank'><i class='icon-twitter'></i></a></li>";
                       ?>

                    
                </ul>   
                 <ul>
                     <li>Name <strong class="pull-right"><?php echo $userFName." ".$userLName; ?></strong> </li>
                     <li>Email <strong class="pull-right"><?php echo $userEmail; ?></strong></li>
                     <li>Age<strong class="pull-right"><?php echo $userAge; ?></strong></li>
                     <li>Education Level<strong class="pull-right"><?php echo $userEduName; ?></strong></li>
                     <li>Occupation<strong class="pull-right"><?php echo $userOccuName; ?></strong></li>
                     <li>Telephone  <strong class="pull-right"><?php echo $userPhone; ?></strong></li> 
                     
                     <li>Membership Type<strong class="pull-right"><?php echo $userType; ?></strong></li>
                     
                </ul>
              
			</div><!-- End box-sidebar -->
     </aside><!-- End aside -->
     
     <div class="col-md-8">
     
     			<!--  Tabs -->   
                    <ul class="nav nav-tabs" id="mytabs">
                        <li class="active"><a href="#profile_teacher" data-toggle="tab">Profile</a></li>
                        <li><a href="#courses" data-toggle="tab">Instructor's Courses</a></li>
                     
                    </ul>
                    
                     <div class="tab-content">
                    
                        <div class="tab-pane fade in active" id="profile_teacher">
                            <h3>About me</h3>
                            <?php echo $userAbout; ?>
						</div>
                       
                       <div class="tab-pane fade in" id="courses">
                       			
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead >
                                      <tr >
                                        <th>Category</th>
                                        <th>Course name</th>
                                        <th>Lessons</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	$countIns=0;
                                    	$query="select c.id ,ca.name as catagoryName, c.name as courseName from courses c  join catagories ca on ca.id=c.catagoryId  where c.teacherId=$getUserId order by catagoryName asc, courseName asc";
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
                                       	<td><?php echo  $catagoryName;?></td>
                                        <td><a href="course.php?courseId=<?php echo $courseId; ?>"><?php echo $courseName;?></a></td>
                                        <td><?php echo $countLesson; ?></td>
                                        
                                      </tr>
                                     <?php
                                     	}
                                     	
                                     ?>                                                                                  
                                    </tbody>
                                  </table>
                                  <?php if($count==0) echo "No course :("; ?>
                                  </div>
                       </div><!-- End tab-pane -->
                                             
                  </div>   <!-- End content-->              
		
     </div><!-- End col-md-8-->   	
  </div><!-- End row-->   
</div><!-- End container -->
</section><!-- End main_content-->


<?php include_once "footer.php"; ?>

  </body>
</html>
<?php 
	} 
}
else
{
	header("Location:login.php");
	
	}
?>