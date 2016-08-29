<li><a href="<?php baseUrl(); ?>">Anasayfa</a></li>
<li><a href="courseList">Kurslar</a></li>

<?php if($userId != ""){ ?>
    <li class="mega_drop_down">
        <a href="#">Profilim</a>
        <div class="mobnav-subarrow"></div>
        <div class="sf-mega">
            <div class="col-md-4 col-sm-6">
                <h5>Profil Hakkında</h5>
                <ul class="mega_submenu">

                    <li style="margin-top:10%">
                        <?php 	
                            //include_once("connectionDB.php");
                            $querySearch="select id,profileImageURL from users where id='$userId'";
                            //$runQuery=mysql_query($querySearch);
                            while(false) //$fetchQuery=mysql_fetch_array($runQuery)
                            {
                                //$userImageProfileURL=$fetchQuery["profileImageURL"];
                            }
                        ?>
                        <center><img class="img-rounded " style="width:120px;height:120px;" src="<?php assetsUrl(); ?><?php  //echo $userImageProfileURL; ?>" alt="" /></center>
                        <p>
                           <h4 class="text-center"><?php echo $userFName.' '.$userLName; ?></h4>
                        </p>

                        <a href="<?php echo baseUrl()."myProfile";?>" class="text-center">Profil Detaylarına Git</a>

                    </li>
                </ul>
            </div>

            <div class="col-md-8 col-sm-6">
                <h5>Kurslarım</h5>
                <ul class="mega_submenu">
                    <?php
                    $querySearch="select courseId from courseToUser where userId='$userId'";
                    //$runQuery=mysql_query($querySearch);
                    $count=0;
                    while(false) //$fetchQuery=mysql_fetch_array($runQuery)
                    {
                        $count++;
                        $courseId=$fetchQuery["courseId"];
                        $queryCourseInfo="select c.name, cD.ImageURL from courses c inner join courseDetails cD on c.id=cD.courseId where c.id=$courseId";
                        $runQueryCI=mysql_query($queryCourseInfo);
                        while($fetchQueryCI=mysql_fetch_array($runQueryCI))
                        {
                            $courseName=$fetchQueryCI["name"];
                            $courseImageURL=$fetchQueryCI["ImageURL"];
                        }
                        $queryX="select count(*) as OK from lessons where courseId=$courseId";
                        $runQueryX=mysql_query($queryX);
                        while($fetchQueryX=mysql_fetch_array($runQueryX))
                            $countLesson=$fetchQueryX["OK"];
                        $queryX="select count(*) as OK from lessonProgress lP inner join lessons l on l.id=lP.lessonId  where lP.userId=$userId and lP.lessonLegendId=2 and l.courseId=$courseId";
                        $runQueryX=mysql_query($queryX);
                        while($fetchQueryX=mysql_fetch_array($runQueryX))
                             $countCompleted=$fetchQueryX["OK"];

                        $percentage=(100*$countCompleted)/$countLesson;
                    ?>

                    <li>
                        <div class="row">
                            <div class="col-xs-4">

                                <div class="photo">
                                   <img class="img-rounded" style="width:160px;height:120px;" src="<?php assetsUrl(); ?><?php echo $courseImageURL; ?>" alt="" />

                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="course_info text-center">
                                            <a href=" <?php assetsUrl(); ?><?php echo 'course.php?courseId='.$courseId; ?>"><?php echo  $courseName; ?></a>
                                        </div>
                                        <span>You complete <strong><?php echo $countCompleted; ?></strong> out of <strong><?php echo $countLesson; ?></strong> derslerin</span><span id="end"><i class="icon-trophy"></i></span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" data-percentage="<?php echo $percentage; ?>"></div>
                                        </div>
                                    </div>
                                </div><!-- End progress bar -->
                                <!-- end col-xs-8 -->
                            </div>
                        <!-- end row -->
                        </div>
                    </li>

                <?php
                    } 
                        
                    if($count == 0){
                ?>

                    <li>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="course_info text-center">
                                    <h4> Hiç kayıtlı kursun yok :(</h4>
                                </div>
                            </div>
                        </div>
                    </li>	 		
                <?php	 		
                    }
                 ?>


                </ul>
            </div>
        </div>
    </li>
<?php }?>

<li><a href="contact">İletişim</a></li>