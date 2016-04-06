
<footer>

<div class="container" id="nav-footer">
	<div class="row text-left">
		<div class="col-md-3 col-sm-3">
			<h4>Browse</h4>
			<ul>
				
				<li><a href="instructors.php">Instructors</a></li>
				
				
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>Courses</h4>
			<ul>
			<?
						include_once "connectionDB.php";
	                	$querySearch="select * from catagories";
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
	                	$catagoryId=$fetchQuery["id"];
	                	$catagoryName=$fetchQuery["name"];
	          ?>
				<li><a href="<? echo "courseList.php?catagoryId=$catagoryId"; ?>"><? echo $catagoryName; ?></a></li>
				<? 
						}
				?>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>About Learn</h4>
			<ul>
				<li><a href="aboutUs.php">About Us</a></li>
				<li><a href="applyInstructor.php">Become Instructor</a></li>
				<li><a href="termsAndConditions.php">Terms and Conditions</a></li>
				<li><a href="register.php">Register</a></li>
                <li><a href="contact.php">Contact Us</a></li>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<ul id="follow_us">
				<li><a href="#"><i class="icon-facebook"></i></a></li>
				<li><a href="#"><i class="icon-twitter"></i></a></li>
				<li><a href="#"><i class=" icon-google"></i></a></li>
			</ul>
			<ul>
				<li><strong class="phone">+90 312 210 27 96</strong><br><small>Mon - Fri / 9.00AM - 05.00PM</small></li>
				<li>Questions? <a href="#">bekirsevki@gmail.com</a></li>
			</ul>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
</div>
<div id="copy_right">This project is done for National CEIT Congress © 2015</div>
</footer>

<div id="toTop">Back to top</div>

<!-- JQUERY -->
<script src="js/jquery-1.10.2.min.js"></script>

<!-- OTHER JS --> 
<script src="js/superfish.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="assets/validate.js"></script>
<script src="js/jquery.fitvids.js"></script> <!-- for video responsive-->
<script src="js/jquery.placeholder.js"></script>
<script src="js/functions.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>


<script>new UISearch( document.getElementById( 'sb-search' ) );</script>

<!-- GOOGLE MAP -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/mapmarker.jquery.js"></script>
<script type="text/javascript" src="js/mapmarker_func.jquery.js"></script>

<script type="text/javascript">
/* <![CDATA[ */

setTimeout(function(){

    $('.progress .progress-bar').each(function() {
        var me = $(this);
        var perc = me.attr("data-percentage");

        var current_perc = 0;

        var progress = setInterval(function() {
            if (current_perc>=perc) {
                clearInterval(progress);
            } else {
                current_perc +=1;
                me.css('width', (current_perc)+'%');
            }

            me.text((current_perc)+'%');

        }, 50);

    });

},500);
  /* ]]> */
</script> 
