<?php include_once "sessions.php"; ?>
<?php include_once "header.php"; 

	if($courseTeacherId==$userId)
		$countLesson=1;
	
	if($getLessonId=="" || $countLesson!=1)
		header("Location:courseList.php");
		
		
	$queryLesson="select l.name, l.content, lT.name as lessonTName, l.fileURL from lessons l inner join lessonTypes lT on lT.id=l.typeId where l.id=$getLessonId";
	$queryLesson=mysql_real_escape_string($queryLesson);
	$runQueryLesson=mysql_query($queryLesson);
	while($fetchQueryLesson=mysql_fetch_array($runQueryLesson))
	{
		$lessonName=$fetchQueryLesson["name"];
		$lessonContent=$fetchQueryLesson["content"];
		$lessonTypeName=$fetchQueryLesson["lessonTName"];
		$lessonFileURL=$fetchQueryLesson["fileURL"];
	}
?>
<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1><?php echo $lessonName; ?></h1>
                
            </div>
        </div><!-- End row -->
        
        
    </div><!-- End container -->
    <div class="divider_top"></div>
</section>


  
  <section id="main_content">
  <div class="container">
  
<ol class="breadcrumb">
      <li><a href="courseList.php">All Courses</a></li>
      <li><a href="course.php?courseId=<?php echo $courseId; ?>"><?php echo $courseName; ?></a></li>
      <li class="active"><?php echo $lessonName; ?></li>
</ol>

	 <div class="row">
     		<div class="col-md-12">
     		<hr>
			<?php 
			if($lessonTypeName=="Video")
			{	
				 echo "<iframe src='$lessonFileURL' style='border:0;' class='video_course' allowfullscreen></iframe><br/>";
			}
			echo $lessonContent;
			          
           
                
                
                //$server=$_SERVER['HTTP_HOST'];
                //$direction=rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                //$targetPage="index.php";
                //$server.$direction."/".$targetPage;
                //header("Location: http://$server$direction/$targetPage");
                //echo "<meta http-equiv='refresh' content='0; url=http://$server$direction/$targetPage'>";
                
            $query="select * from lessonProgress where userId=$userId and lessonId=$getLessonId";
            $query=mysql_real_escape_string($query);
			$runQuery=mysql_query($query);
			while($fetchQuery=mysql_fetch_array($runQuery))
				$lessonLegendId=$fetchQuery["lessonLegendId"];
            ?>
            <div class="clearfix text-center"><a href="process_completion.php?lessonId=<?php echo $getLessonId; ?>" class="button_medium_outline <?php if($lessonLegendId==2) echo "btn disabled" ?>">Mark as Complete <?php if($lessonLegendId==2) echo "<i class='icon-ok'></i>" ?></a>  </div>
            </div><!-- End col-md-12  -->
            
           
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>



<?php include "footer.php"; ?>

  </body>
</html>