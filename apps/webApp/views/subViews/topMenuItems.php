<li><a href="<?php baseUrl(); ?>">Anasayfa</a></li>
<li><a href=<?php echo baseUrl()."courseList"; ?>>Kurslar</a></li>

<?php if($username != ""){ ?>
    <li class="mega_drop_down">
        <a href="#">Profilim</a>
        <div class="mobnav-subarrow"></div>
        <div class="sf-mega">
            <div class="col-md-4 col-sm-6">
                <h5>Profil Hakkında</h5>
                <ul class="mega_submenu">

                    <li style="margin-top:10%">

                        <center><img class="img-rounded " style="width:120px;height:120px;" src="<?php assetsUrl(); ?><?php  //echo $userImageProfileURL; ?>" alt="" /></center>
                        <p>
                           <h4 class="text-center"><?php echo $userFName.' '.$userLName; ?></h4>
                        </p>

                        <a href="<?php echo baseUrl()."profile";?>" class="text-center">Profil Detaylarına Git</a>

                    </li>
                </ul>
            </div>

            <div class="col-md-8 col-sm-6">
                <h5>Kurslarım</h5>
                <ul class="mega_submenu">
                    <?php
                    $topMenuData = session('topMenu');
                    $topCountCourse = $topMenuData['countCourse'];

                        
                    if($topCountCourse === 0){
                    ?>

                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="course_info text-center">
                                        <h4> Hiç kursun yok :(</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php
                    }else if($topCountCourse>0){
                        $topCourse=$topMenuData['course'];
                        for ($i=0; $i<$topCountCourse;$i++){
                            $topTemp = $topCourse["a".$i];
                            $topCourseName=$topTemp["courseName"];
                            $topCountLesson=$topTemp["countLesson"];
                            $topCountCompleted=$topTemp["countCompleted"];
                            $topCourseLink=$topTemp["courseLink"];

                            $topPercentage=(100*$topCountCompleted)/$topCountLesson;

                    ?>
                        <li>
                            <div class="row">
                                <div class="col-xs-4">

                                    <div class="photo">
                                       <img class="img-rounded" style="width:160px;height:120px;" src="<?php assetsUrl(); ?><?php //echo $courseImageURL; ?>" alt="" />

                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="course_info text-center">
                                                <a href=" <?php baseUrl(1,"course/".$topCourseLink); ?>"><?=$topCourseName; ?></a>
                                            </div>
                                            <span>You complete <strong><?=$topCountCompleted; ?></strong> out of <strong><?=$topCountLesson; ?></strong> derslerin</span><span id="end"><i class="icon-trophy"></i></span>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" data-percentage="<?=$topPercentage; ?>"></div>
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
                    }
                    ?>


                </ul>
            </div>
        </div>
    </li>
<?php }?>

<li><a href="<?php baseUrl(1,"contact");?>">İletişim</a></li>