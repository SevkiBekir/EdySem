
<footer>

<div class="container" id="nav-footer">
	<div class="row text-left">
		<div class="col-md-3 col-sm-3">
			<h4>Browse</h4>
			<ul>
				
				<li><a href="instructors">Instructors</a></li>
				
				
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>Courses</h4>
			<ul>
			<?php
						include_once "connectionDB.php";
	                	$querySearch="select * from catagories";
	                	$runQuery=mysql_query($querySearch);
	                	while($fetchQuery=mysql_fetch_array($runQuery))
	                	{
	                	$catagoryId=$fetchQuery["id"];
	                	$catagoryName=$fetchQuery["name"];
	          ?>
				<li><a href=" <?php assetsUrl(); ?><?php echo "courseList.php?catagoryId=$catagoryId"; ?>"><?php echo $catagoryName; ?></a></li>
				<?php 
						}
				?>
			</ul>
		</div><!-- End col-md-4 -->
		<div class="col-md-3 col-sm-3">
			<h4>About Learn</h4>
			<ul>
				<li><a href="aboutUs">About Us</a></li>
				<li><a href="applyInstructor">Become Instructor</a></li>
				<li><a href="termsAndConditions">Terms and Conditions</a></li>
				<li><a href="register">Register</a></li>
                <li><a href="contact">Contact Us</a></li>
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
<script src="<?php assetsUrl(); ?>js/jquery-1.10.2.min.js"></script>

<!-- OTHER JS --> 
<script src="<?php assetsUrl('js/superfish.js'); ?>"></script>
<script src="<?php assetsUrl('js/bootstrap.min.js'); ?>"></script>
<script src="<?php assetsUrl('js/retina.min.js'); ?>"></script>
<script src="<?php assetsUrl('assets/validate') ?>"></script>
<script src="<?php assetsUrl('js/jquery.fitvids.js'); ?>"></script> <!-- for video responsive-->
<script src="<?php assetsUrl('js/jquery.placeholder.js'); ?>"></script>
<script src="<?php assetsUrl('js/functions.js'); ?>"></script>
<script src="<?php assetsUrl('js/classie.js'); ?>"></script>
<script src="<?php assetsUrl('js/uisearch.js'); ?>"></script>


<script>new UISearch( document.getElementById( 'sb-search' ) );</script>

<!-- GOOGLE MAP -->
<script type="text/javascript" src="<?php assetsUrl(); ?>http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php assetsUrl('js/mapmarker.jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php assetsUrl('js/mapmarker_func.jquery.js'); ?>"></script>

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
