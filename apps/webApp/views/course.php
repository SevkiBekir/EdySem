
<?php include_once ("header.php"); 
	/*
	$getCourseId="";
	$getCourseId=$_GET['courseId'];
	
	if($getCourseId=="")
		header("Location:courseList.php");
	*/
	
        
        

        $courseName=$course["courseName"];
		$instructorUsername=$instructor["username"];
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
      <li><a href="<?php baseUrl(1,"courseList");?>">Bütün Kurslar</a></li>
      <li class="active"><?php echo $courseName; ?></li>
    </ol>

	 <div class="row">
     		<div class="col-md-8">
                    <?php
                    $isPaid=$controlCourse2User;
                
                    if(($username!=NULL || $username!=0) && $isPaid)
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
                
                	

                    
                    
                	$usedChapter=0;
					foreach($lessons as $row)
					{
						$lessonId=$row["lessonId"];
	                    $lessonName=$row["lessonName"];
	                    $lessonDuration=$row["lessonDuration"];
	                    $lessonTypeName=$row["lessonTypeName"];
	                    $chapterName=$row["chapterName"];
	                    $chapterNo=$row["chapterNo"];
	                    if($usedChapter==0 || $usedChapter!=$chapterNo) // What r u doing dude?
	                    {
	                    	$usedChapter=$chapterNo;
		                    echo "<h3 class='chapter_course'>Chapter $chapterNo: $chapterName  </h3>";
	                    }
					
						$legendName=convert2LegendName($row["getLegendName"]);
						$link=$row["link"];
							
	                    
	                ?>
	                
	                	<div class="strip_single_course disabled">
	                        <h4 class=" <?php if($isPaid==1 || $instructorUsername==$username) echo " "; else echo "btn disabled "; if($legendName==NULL) echo "start"; else if($legendName!="") echo $legendName; ?> ">
								<a href=" <?php if($isPaid==1 || $instructorUsername==$username) baseUrl(1,"course/".$this->uri->segment(2)."/lesson/".$link); else echo "#"?>"><?php echo $lessonName; ?>
						    </h4>
	                        <ul >
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
            		
            			
						if($isPaid==1 or $instructorUsername==$username)
						{
							echo "<a href='#' class='btn disabled button_fullwidth-3'>Start Learning</a>";
						}
						else
						{
						?>
							<a href=" <?php baseUrl(1,"/course/".$this->uri->segment(2)."/payment"); ?>" class='btn button_fullwidth-3'><?php echo $coursePrice; ?>₺ Öde & Öğrenmeye Başla</a>
						<?php
						}
						
							
	        				
        		 ?>
            	  	
            	<div class="box_style_1">
         			<h4>Dersler <span class="pull-right"><?php echo $countLesson; ?></span></h4>
         			<h4>Toplam Süre <span class="pull-right"><?php echo $sumDurations." Minutes"; ?></span></h4>
                    
                    <?php
                    
						$instructorFName=$instructor["firstName"];
						$instructorLName=$instructor["lastName"];
						$instructorProImURL="#";
						$instructorOccupation=$instructor["occupation"];
                        $instructorEducation=$instructor["education"];
                        $instructorUsername = $instructor["username"];
				    
				    
				  
                     ?>
                	<h4>Eğitmen</h4>
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
                    <h4>Açıklamalar</h4>
                    <ul class="legend_course">
                          <li id="tostart">Başlanılmadı</li>
                          <li id="inprogress">Devam Ediyor</li>
                          <li id="completed">Tamamlandı</li>
                     </ul>
           </div>
       	 	
           
          
         </aside> <!-- End col-md-4 -->
     	
     </div><!-- End row -->
  </div><!-- End container -->
  </section>
  


	<script>
	$('#divObjectives ul').attr('class','list_ok');
	</script>
 