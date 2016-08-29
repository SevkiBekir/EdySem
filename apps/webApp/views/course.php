
<?php include "header.php"; 
	/*
	$getCourseId="";
	$getCourseId=$_GET['courseId'];
	
	if($getCourseId=="")
		header("Location:courseList.php");
	*/
	
        
        

        $courseName=$course["courseName"];
		//$instructorId=$fetchQuery["teacherId"];
		$courseSummary=$course["summary"];
    	$coursePrice=$course["price"];
    	$courseObjectives=$course["objectives"];
    
		
?>


<section id="sub-header" >
  	<div class="container">
    
    	<div class="row">
        	<div class="col-md-12 text-center">
            	<h1><?php echo $courseName; ?></h1>
        </div>
        </div><!-- End row -->
        
        <div class="row" id="sub-header-features-2">
        	<div class="col-md-6">
            	<h2>Kurs Özeti</h2>
                <?php echo $courseSummary; ?>
                
            </div>
            <div class="col-md-6" id="divObjectives">
            	<h2>Neler Öğreneceğiz?</h2>
            	<?php echo $courseObjectives; ?>
            </div>
        	
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="divider_top"></div>
  </section>
  
  <section id="main_content">
  <div class="container">
  
  <ol class="breadcrumb">
      <li><a href="courseList">Bütün Kurslar</a></li>
      <li class="active"><?php echo $courseName; ?></li>
    </ol>

	 <div class="row">
     		<div class="col-md-8">
                    <?php
                    
                
                    if($userId!=NULL or $userId!=0)
                    {
                        $percentage=(100*$countCompleted)/$countLesson;
                        
	        			
						
	        			
	        			
                    ?>
                    
                    
                    <div class="row">
                    	<div class="col-md-12">
                        	<span>Şuana kadar <strong><?php echo $countLesson; ?></strong> dersten <strong><?php echo $countCompleted; ?></strong> tanesini tamamladınız</span><span id="end"><i class="icon-trophy"></i></span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" data-percentage="<?php echo $percentage; ?>"></div>
                                </div>
                        </div>
                    </div><!-- End progress bar -->
                    
                    <hr>
                    <?php
                    } // END PROGRESS BAR 
                
                	/* BAKILACAK BURAYA
					$queryPay="select count(*) as OK from courseToUser where userId=$userId and courseId=$getCourseId";
					$runQueryPay=mysql_query($queryPay);
					while($fetchQueryPay=mysql_fetch_array($runQueryPay))
						$isPaid=$fetchQueryPay["OK"];
                    
                    */
                    
                    $queryLesson="select l.id,l.name,l.duration,lT.name as lessonTypeName, ch.name as chapterName, ch.no as chapterNo from lessons l join chapters ch on ch.id=l.chapterId join lessonTypes lT on lT.id=l.typeId where l.courseId=$getCourseId";
                    $runQueryLesson=mysql_query($queryLesson);
                    $usedChapter=0;
                    
                    while($fetchQueryLesson=mysql_fetch_array($runQueryLesson))
                    {
                    	
	                    $lessonId=$fetchQueryLesson["id"];
	                    $lessonName=$fetchQueryLesson["name"];
	                    $lessonDuration=$fetchQueryLesson["duration"];
	                    $lessonTypeName=$fetchQueryLesson["lessonTypeName"];
	                    $chapterName=$fetchQueryLesson["chapterName"];
	                    $chapterNo=$fetchQueryLesson["chapterNo"];
	                    if($usedChapter==0 || $usedChapter!=$chapterNo) // What r u doing dude?
	                    {
	                    	$usedChapter=$chapterNo;
		                    echo "<h3 class='chapter_course'>Chapter $chapterNo: $chapterName  </h3>";
	                    }
	                    
	                    $queryProgress="select lL.name as legendName from lessonProgress lP inner join lessonLegends lL on lL.id=lP.lessonLegendId where lP.lessonId=$lessonId and lP.userId=$userId";
	                    $runQueryProgress=mysql_query($queryProgress);
	                    while($fetchQueryProgress=mysql_fetch_array($runQueryProgress))
							$legendName=$fetchQueryProgress["legendName"];
							
	                    
	                ?>
	                
	                	<div class="strip_single_course">
	                        <h4 class=" <?php if($isPaid==1 || $instructorId==$userId) echo " "; else echo "btn disabled "; if($legendName=="") echo "start"; else if($legendName!="") echo $legendName; ?> "><a href=" <?php assetsUrl(); ?><?php echo "lesson.php?lessonId=$lessonId"; ?>"><?php echo $lessonName; ?></a></h4>
	                        <ul>
	                              <li><i class="icon-clock"></i> <?php echo  $lessonDuration." Minutes"; ?></li>
	                              <li><i class="icon-<?php if($lessonTypeName=="Text") echo "doc"; else if($lessonTypeName==".mp4") echo "video"; ?>"></i><?php echo $lessonTypeName; ?></li>
	                        </ul>
	                    </div><!-- end strip single course -->
	                
	                <?php
                    }
                    
                    ?>
                    
                    
                  
                                                         
            </div><!-- End col-md-8  -->
            
            <aside class="col-md-4">
            		<?php 
            		
            			
						if($isPaid==1 or $instructorId==$userId)
						{
							echo "<a href='#' class='btn disabled button_fullwidth-3'>Start Learning</a>";
						}
						else
						{
							echo "<a href='payment/' class='btn button_fullwidth-3'>Pay $coursePrice & Start Learning</a>";
						}
						
						$query="select sum(duration) as hours from lessons where courseId=$getCourseId";
	        			$runQuery=mysql_query($query);
	        			while($fetchQuery=mysql_fetch_array($runQuery))
	        				$totalHours=$fetchQuery["hours"];

        		 ?>
            	  	
            	<div class="box_style_1">
         			<h4>Lessons <span class="pull-right"><?php echo $countLesson; ?></span></h4>
         			<h4>Total Duration <span class="pull-right"><?php echo $totalHours." Minutes"; ?></span></h4>
                    
                    <?php
                    
						$instructorFName=$instructor["firstName"];
						$instructorLName=$instructor["lastName"];
						$instructorProImURL="#";
						$instructorOccupation=$instructor["occupation"];
                        $instructorEducation=$instructor["education"];
                        $instructorUsername = $intructor["username"];
				    
				    
				  
                     ?>
                	<h4>Instructor</h4>
                    <div class="media">
                    	<div class="rows">
	                        <div class="col-md-4 pull-left">
	                            <img src="<?php assetsUrl(); ?><?php echo $instructorProImURL; ?>" style="height:50px;width:50px; margin-bottom:5%" class="img-circle" alt="">
	                        </div>
	                        <div class="col-md-8 media-body">
	                            <h5 class="media-heading"><a href=" <?php echo baseUrl()."profile/".$instructorUsername; ?>"><?php echo $instructorFName." ".$instructorLName; ?></a></h5>
	                            <p>
	                               <?php echo $instructorOccupation; ?>
	                            </p>
                                <p>
	                               <?php echo $instructorEducation; ?>
	                            </p>
	                        </div>
                    	</div>
                    </div>
                   
                   
           </div>
           
            <div class="box_style_1">
                    <h4>Legend</h4>
                    <ul class="legend_course">
                          <li id="tostart">Still to start</li>
                         
                          <li id="completed">Completed</li>
                     </ul>
           </div>
       	 	
           
          
         </aside> <!-- End col-md-4 -->
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>
  

<?php include "footer.php"; ?>
	<script>
	$('#divObjectives ul').attr('class','list_ok');
	</script>
  </body>
</html>