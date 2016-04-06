<? include_once "sessions.php"; ?>
<? include_once "header.php"; 
	
	$getLessonId="";
	$getLessonId=$_GET['lessonId'];
	
	include_once "connectionDB";
	
	$query="select count(*) as OK, c.name,c.id,c.teacherId from lessons l join courseToUser cTU on cTU.courseId=l.courseId  join courses c on c.Id=l.courseId where cTU.userId=$userId and l.id=$getLessonId";
	$query=mysql_real_escape_string($query);
	$runQuery=mysql_query($query);
	while($fetchQuery=mysql_fetch_array($runQuery))
	{
		$countLesson=$fetchQuery["OK"];
		$courseName=$fetchQuery["name"];
		$courseId=$fetchQuery["id"];
		$courseTeacherId=$fetchQuery["teacherId"];
	}
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
            	<h1><? echo $lessonName; ?></h1>
                
            </div>
        </div><!-- End row -->
        
        
    </div><!-- End container -->
    <div class="divider_top"></div>
</section>


  
  <section id="main_content">
  <div class="container">
  
<ol class="breadcrumb">
      <li><a href="courseList.php">All Courses</a></li>
      <li><a href="course.php?courseId=<? echo $courseId; ?>"><? echo $courseName; ?></a></li>
      <li class="active"><? echo $lessonName; ?></li>
</ol>

	 <div class="row">
     		<div class="col-md-12">
     		<hr>
			<? 
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
            <div class="clearfix text-center"><a href="process_completion.php?lessonId=<? echo $getLessonId; ?>" class="button_medium_outline <? if($lessonLegendId==2) echo "btn disabled" ?>">Mark as Complete <? if($lessonLegendId==2) echo "<i class='icon-ok'></i>" ?></a>  </div>
            </div><!-- End col-md-12  -->
            
           
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>



<? include "footer.php"; ?>

  </body>
</html>