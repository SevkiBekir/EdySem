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
    $lessonContent = $getLessonWithContent -> content;

    // obje dönüyor veya return value "başlanılmadı" dönüyor.
    if($lessonLegendName != "Başlanılmadı"){
        $lessonLegendName = $lessonLegendName -> legendName;
    }


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
			if($documentTypeName==".mp4")
			{	
				 echo "<iframe src='$lessonFileURL' style='border:0;' class='video_course' allowfullscreen></iframe><br/>";
			}
			echo $lessonContent;


            ?>
            <div class="clearfix text-center"><a href=" <?php baseUrl(1,"/course/".$this->uri->segment(2)."/lesson/".$this->uri->segment(4)."/completed"); ?>" class="button_medium_outline <?php if($lessonLegendName=="Tamamlandı") echo "btn disabled" ?>">Mark as Complete <?php if($lessonLegendName=="Tamamlandı") echo "<i class='icon-ok'></i>" ?></a>  </div>
            </div><!-- End col-md-12  -->
            
           
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>


  </body>
</html>