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
include_once("header.php");


?>
 <section id="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1>Course List</h1>
               	<p class="lead boxed ">Learn Whatever you want <?php $price; ?></p>
                
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="divider_top"></div>
    </section><!-- End sub-header -->
    
 <section id="main_content">
    	<div class="container">
        
        
        <div class="row">
        
        <aside class="col-lg-3 col-md-4 col-sm-4">
        	<?php if($getSearch!="")
        	{ ?>
        	<div class="box_style_1">
            	<h4>Search</h4>
                <ul class="submenu-col">
                	<li><a href="<?php echo "courseList";if($getCatagoryId!="") echo "?catagoryId=$getCatagoryId"; ?>"><?php echo $getSearch; ?><i class="pull-right icon-off"></i> </a></li>
                </ul>
        	</div>
            <?php
            }
            			
            			$queryCountCat="select count(*) as numbers from courses";
	                	$runQueryCountCat=mysql_query($queryCountCat);
	                	while($fetchQueryCountCat=mysql_fetch_array($runQueryCountCat))
	                		$countCatagory=$fetchQueryCountCat["numbers"]; 
             ?>
            <div class="box_style_1">
            	<h4>Categories</h4>
                <ul class="submenu-col">
                	 <li><a href=" <?php assetsUrl(); ?>courseList.php<?php if($getSearch!="") echo "&search=$getSearch"; ?>" id="<?php if($getCatagoryId=="") echo "active"; ?>">All Courses <span class="badge"><?php echo $countCatagory; ?></a></li>
                <?php
						
	                	$querySearch="select * from catagories";
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
	                	$catagoryId=$fetchQuery["id"];
	                	$catagoryName=$fetchQuery["name"];
	                	
	                	$queryCountCat="select count(*) as numbers from courses where catagoryId=$catagoryId";
	                	$runQueryCountCat=mysql_query($queryCountCat);
	                	while($fetchQueryCountCat=mysql_fetch_array($runQueryCountCat))
	                		$countCatagory=$fetchQueryCountCat["numbers"];
	                	
	          ?>
                   
                    	
                    <li><a href=" <?php assetsUrl(); ?><?php echo "courseList.php?catagoryId=$catagoryId"; if($getSearch!="") echo "&search=$getSearch"; ?>" id="<?php if($getCatagoryId=="$catagoryId") echo "active"; ?>"><?php echo $catagoryName." "; ?><span class="badge"><?php echo $countCatagory; ?></span></a></li>
              <?php 
						}
			  ?>
                    
                </ul>
           
            </div>
            
        </aside>
        
        <div class="col-lg-9 col-md-8 col-sm-8">
        	<div class="row">
        	<?php 			
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
		                	
		                	
	                	}
	                	
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
	                		$courseName=$fetchQuery["name"];
	                		$courseId=$fetchQuery["id"];
	                		$courseSummary=$fetchQuery["summary"];
	                		$catagoryId=$fetchQuery["catagoryId"];
		                	$courseImageURL=$fetchQuery["ImageURL"];
		                	$coursePrice=$fetchQuery["price"];
		                	
		                	
		                	
		                	$timeDiffQuery="SELECT DATEDIFF(NOW(),c.date) AS days,c.date,c.id from courses c where c.id=$courseId";
		                	$runQueryTimeDiff=mysql_query($timeDiffQuery);
		                	while($fetchTimeDiffQuery=mysql_fetch_row($runQueryTimeDiff))
		                	{
								$timeDiff=$fetchTimeDiffQuery[0];
							}
		                	
		            ?>
        		<div class="col-lg-4 col-md-6">
                     <div class="col-item">
                            
                     	<div class="photo">
                        	 <a href=" #"><img src="<?php echo $courseImageURL; ?>" alt="" /></a>
                                    <?php
                                    $query="select * from catagories where id=$catagoryId";
				                	$runQueryNew=mysql_query($query);
				                	while($fetchQueryNew=mysql_fetch_array($runQueryNew))
				                	{
				                		$catagoryName=$fetchQueryNew["name"];
				                	}
                                     ?>
                                    <div class="cat_row"><a href=" <?php assetsUrl(); ?><?php echo "courseList.php?catagoryId=$catagoryId"; ?>"><?php echo  $catagoryName; ?></a><span class="pull-right"><i class=" icon-clock"></i><?php echo $timeDiff. " days ago"; ?></span></div>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="course_info col-md-12 col-sm-12">
                                            <h4> <?php echo  $courseName; ?></h4>
                                            <p > <?php echo  $courseSummary; ?> </p>
                                            <div class="price text-center"><?php echo $coursePrice; ?></div> 
                                        </div>
                                    </div>
                                    <div class="separator clearfix">
                                        
                                        <p > <a href=" <?php assetsUrl(); ?><?php echo "course.php?courseId=$courseId" ?>"><i class=" icon-list"></i> Details</a></p>
                                    </div>
                                </div>
                           </div>
                        </div>
                        
                        
						 <?php
		                	
		                	}
	                	?>
					
                        
            </div><!-- End row -->
        </div><!-- End col-lg-9-->
        
        			
                        
        </div><!-- End row -->   
	</div><!-- End container --> 
 </section>


