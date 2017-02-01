
<?php 
 /**
     * SemTech Co -> E-Learning Project
     * @2016
     * ************ T E A M ************
     * Şevki KOCADAĞ -> bekirsevki@gmail.com
     * Asim Dogan NAMLI -> asim.dogan.namli@gmail.com
     * Okan KAYA -> okankaya93@gmail.com
     * 
     */

include_once "header.php"; 
	/*
	$getCatagoryId="";
	$getCatagoryId=$_GET['catagoryId'];
	$getSearch="";
	$getSearch=$_GET['search'];
	*/
?>

<section id="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1>Kurslarımız</h1>
               	<p class="lead boxed ">Öğrenmek güzeldir!</p>
                
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="divider_top"></div>
    </section><!-- End sub-header -->
    
 <section id="main_content">
    	<div class="container">
        
        
        <div class="row">
        
        <aside class="col-lg-3 col-md-4 col-sm-4">
        	<?php /*if($getSearch!="")
        	{ ?>
        	<div class="box_style_1">
            	<h4>Search</h4>
                <ul class="submenu-col">
                	<li><a href="<?php echo "courseList";if($getCatagoryId!="") echo "?catagoryId=$getCatagoryId"; ?>"><?php echo $getSearch; ?><i class="pull-right icon-off"></i> </a></li>
                </ul>
        	</div>
            <?php
            }*/
            			$countCourse = $countCourse['count'];
            			
            			$getSearch = "";  // ???
             ?>
            <div class="box_style_1">
            	<h4>Categories</h4>
                <ul class="submenu-col">
                    <li>
                        <a href=" <?php baseUrl(); ?><?php echo (!$search) ? "courseList/":"courseList/search/"; echo ($search) ?"?words=".$words."&csrf_token=".get('csrf_token'):"";?>" id="<?php echo ($active==NULL) ? "active":""; ?>">All Courses <span class="badge"><?php echo $countCourse; ?></span></a>
                    </li>
                    <?php
						foreach($catagories as $row){
							$catagoryId = $row["catagoryId"];
							$catagoryName = $row["catagoryName"];
						    $countCatagory = $row["count"];


	               ?>

                    	
                                <li><a href=" <?php baseUrl(); ?><?php echo (!$search) ? "courseList/catagory/":"courseList/search/catagory/"; echo prepareCourseNameLink($catagoryName); echo ($search) ?"?words=".$words."&csrf_token=".get('csrf_token'):"";?>" id="<?php echo ($active==prepareCourseNameLink($catagoryName)) ? "active":""; ?>"><?php echo $catagoryName." "; ?><span class="badge"><?php echo $countCatagory; ?></span></a></li>
                <?php 

						}

                ?>
                    
                </ul>
           
            </div>
            
        </aside>
        
        <div class="col-lg-9 col-md-8 col-sm-8">
        	<div class="row">
        	<?php 		
                /*
                include_once("connectionDB.php");
                $querySearch="select c.id,c.name,cD.summary,c.catagoryId,cD.ImageURL,c.price from courses c inner join courseDetails cD on c.id=cD.courseId";
                if($getCatagoryId!="" || $getSearch!="")
                {
                    $querySearch.=" where";

                    if($getCatagoryId!="")
                        $querySearch.=" c.catagoryId=$getCatagoryId";
                    if($getCatagoryId!="" && $getSearch!="")
                        $querySearch.=" and";
                    if($getSearch!="")
                        $querySearch.=" c.name like '%$getSearch%'";


                }*/

                foreach($courseData as $row){
                                $courseName=$row["courseName"];
                                $courseSummary=$row["courseSummary"];
                                $coursePrice=$row["coursePrice"];
                                $timeDiff=$row["courseDateDifference"];
                                $catagoryName=$row["courseCatagoryName"];
                                $courseRating=$row["courseRating"];
								$courseImageURL="http://sevkikocadag.com/kurultay/img/courses.png";
                                $courseLink=$row["courseLink"];
            
                                    
                                    
                                    
               
		                	
		        ?>
        		<div class="col-lg-4 col-md-6">
                     <div class="col-item">
                            
                     	<div class="photo">
                            <a href="<?php baseUrl(); ?><?php echo "course/".$courseLink ?>"><img src="<?php echo $courseImageURL; ?>" alt="" /></a>

                            <div class="cat_row"><a href=" <?php baseUrl(); ?><?php echo "courseList/catagory/".prepareCourseNameLink($catagoryName); ?>"><?php echo  $catagoryName; ?></a><span class="pull-right"><i class=" icon-clock"></i><?php  echo $timeDiff." day"; echo ($timeDiff!=1) ?  "s":""; echo " ago"; ?></span></div>
                        </div> <!-- End photo -->
                        <div class="info">
                            <div class="row">
                                <div class="course_info col-md-12 col-sm-12">
                                    <h4> <?php echo  $courseName; ?></h4>
                                    <p > <?php echo  $courseSummary; ?> </p>
                                    <div class="price text-center"><?php echo "₺".$coursePrice; ?></div> 
                                    <div class="rating"> 
                                    <?php for($i=0;$i<$courseRating;$i++){  ?>
                                            <i class="icon-star"></i>
                                    <?php } ?>

                                    </div>
                                </div>
                            </div> <!-- End row -->
                            <div class="separator clearfix">

                                <p > <a href=' <?php baseUrl(); ?><?php echo "course/".$courseLink ?>'><i class=" icon-list"></i> Details</a></p>
                            </div> <!-- End separator -->
                        </div> <!-- End info -->
                                
                   </div> <!-- End col-item-->
                </div><!-- End col-lg-4-->
                        
                        
						 <?php

		                	}
	                	?>
					
                        
            </div><!-- End row -->
        </div><!-- End col-lg-9-->
        
        			
                        
        </div><!-- End row -->   
	</div><!-- End container --> 
 </section>
