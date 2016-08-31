<?php 
	include_once("header.php");

	
	$countLesson=$ControlUser2Lesson->ok;
	$courseName=$ControlUser2Lesson->courseName;
	$courseId=$ControlUser2Lesson->courseId;
	$courseInstructorId=$ControlUser2Lesson->instructorId;
	
	if($courseInstructorId==$userId)
		$countLesson=1;
	
	if($countLesson!=1)
		headerLocation("course/".$courseLink);

	
	$lessonName=$getLessonWithContent->lessonName;
	$explanation=$getLessonWithContent->explanation;
	$documentTypeName=$getLessonWithContent->documentTypeName;
	$lessonFileURL=$getLessonWithContent->fileURL;

?>
  
  <section id="main_content">
  <div class="container">
  
	<ol class="breadcrumb">
		<li><a href="<?php baseUrl(1,"courseList");?>">Bütün Kurslar</a></li>
		<li><a href="<?php baseUrl(1,"course/".$this->uri->segment(2));?>"><?php echo $courseName?></a> </li>
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
            <div class="clearfix text-center"><a href=" <?php assetsUrl(); ?>process_completion.php?lessonId=<?php echo $getLessonId; ?>" class="button_medium_outline <?php if($lessonLegendId==2) echo "btn disabled" ?>">Mark as Complete <?php if($lessonLegendId==2) echo "<i class='icon-ok'></i>" ?></a>  </div>
            </div><!-- End col-md-12  -->
            
           
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>


  </body>
</html>