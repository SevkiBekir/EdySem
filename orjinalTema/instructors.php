<?php include_once "sessions.php"; ?>
<?php include_once "header.php"; 

	
		
?>

<section id="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1>Our Instructor</h1>
               
                
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="divider_top"></div>
    </section><!-- End sub-header -->
    
    
<section id="main_content">

	<div class="container">

		<div class="row">
		
            <?php             	
				include_once "connectionDB.php";
				$query="select firstName,lastName,about,profileImageURL,fbUserName,twUserName,name, u.id as id from users u join occupations o on o.id=u.occupationId where typeId=3";
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
				{
					
					$instructorFName=$fetchQuery["firstName"];
					$instructorLName=$fetchQuery["lastName"];
					$instructorAbout=$fetchQuery["about"];
					$instructorProfileImURL=$fetchQuery["profileImageURL"];
					$instructorFbUser=$fetchQuery["fbUserName"];
					$instructorTWUser=$fetchQuery["twUserName"];
					$instructorOccupation=$fetchQuery["name"];
					$instructorId=$fetchQuery["id"];
					
					
            ?> 
                 	
            <div class="col-md-12">
            	<div class=" box_style_3">
                	<p><img style="height:200px;" src="<?php echo  $instructorProfileImURL; ?>" alt="Teacher" class="img-circle styled"></p>
                    <h4 class="p-title"><?php echo $instructorFName." ".$instructorLName." <small>".$instructorOccupation."</small>"; ?></h4>
 					<p><?php echo $instructorAbout; ?> </p>
                    <ul class="social_team">
                    <?php 
                    if($instructorFbUser!=null)
                       echo "<li><a href='https://www.facebook.com/$instructorFbUser' target='_blank'><i class='icon-facebook'></i></a></li>";
                    if($instructorTWUser!=null)
                       echo "<li><a href='https://www.twitter.com/$instructorTWUser' target='_blank'><i class='icon-twitter'></i></a></li>";
                    
                    
                    ?>
                       
					</ul>    
	                <hr>
	                <a href="<?php echo "profile.php?userId=$instructorId"; ?>" class="button_medium_outline">Profile</a>                      
				</div>
            </div>
            
	            <?php
	            }
				$query="select firstName,lastName,about,profileImageURL,fbUserName,twUserName,name, u.id as id from users u join occupations o on o.id=u.occupationId where typeId=2";
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
				{
					
					$instructorFName=$fetchQuery["firstName"];
					$instructorLName=$fetchQuery["lastName"];
					$instructorAbout=$fetchQuery["about"];
					$instructorProfileImURL=$fetchQuery["profileImageURL"];
					$instructorFbUser=$fetchQuery["fbUserName"];
					$instructorTWUser=$fetchQuery["twUserName"];
					$instructorOccupation=$fetchQuery["name"];
					$instructorId=$fetchQuery["id"];
					
					
            ?>        	
            <div class="col-md-12">
            	<div class=" box_style_3">
                	<p><img style="height:200px;" src="<?php echo  $instructorProfileImURL; ?>" alt="Teacher" class="img-circle styled"></p>
                    <h4 class="p-title"><?php echo $instructorFName." ".$instructorLName." <small>".$instructorOccupation."</small>"; ?></h4>
 					<p><?php echo $instructorAbout; ?> </p>
                    <ul class="social_team">
                    <?php 
                    if($instructorFbUser!=null)
                       echo "<li><a href='https://www.facebook.com/$instructorFbUser' target='_blank'><i class='icon-facebook'></i></a></li>";
                    if($instructorTWUser!=null)
                       echo "<li><a href='https://www.twitter.com/$instructorTWUser' target='_blank'><i class='icon-twitter'></i></a></li>";
                    
                    
                    ?>
                       
					</ul>    
	                <hr>
	                <a href="<?php echo "profile.php?userId=$instructorId"; ?>" class="button_medium_outline">Profile</a>                      
				</div>
            </div>
	            <?php
	            }
	            ?>
                        
        </div><!-- End row -->    
        
</div><!-- End container -->
</section><!-- End main_content-->

<?php include_once "footer.php"; ?>

  </body>
</html>