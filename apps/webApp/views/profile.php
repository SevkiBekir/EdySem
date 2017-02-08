<?php
/**
 *
 * User: sbk
 * Date: 30/01/2017
 * Time: 01:22
 */


    include_once("header.php");


        $userFName=$users["firstname"];
        $userLName=$users["lastname"];
        $userAge=$users["age"];
        $userEduName=$users["education"];
        $userOccuName=$users["occupation"];
        $userPhone=$users["phone"];
        $userFbUserName=$users["facebook"];
        $userTwUserName=$users["twitter"];
        $userAbout=$users["about"];
        $userEmail=$users["email"];
        $userType=$users["membership"];
        $totalCourse=$users["countCourse"];


        $userProfileImageURL=""; // DÜZENLENECEK




?>
<section id="main_content">

    <div class="container">
        <div class="row">
            <aside class="col-md-4">
                <div class=" box_style_1 profile">
                    <p class="text-center"><img style="width:200px;height:200px;" src="<?php echo $userProfileImageURL; ?>" alt="Teacher" class="img-circle styled"></p>
                    <ul class="social_teacher">
                        <?php
                        if($userFbUserName!=null)
                            echo "<li><a href='https://www.facebook.com/$userFbUserName' target='_blank'><i class='icon-facebook'></i></a></li>";
                        if($userTwUserName!=null)
                            echo "<li><a href='https://www.twitter.com/$userTwUserName' target='_blank'><i class='icon-twitter'></i></a></li>";
                        ?>


                    </ul>
                    <ul>
                        <li>İsim <strong class="pull-right"><?php echo $userFName." ".$userLName; ?></strong> </li>
                        <li>Email <strong class="pull-right"><?php echo $userEmail; ?></strong></li>
                        <li>Yaş<strong class="pull-right"><?php echo $userAge; ?></strong></li>
                        <li>Eğitim Seviyesi<strong class="pull-right"><?php echo $userEduName; ?></strong></li>
                        <li>Meslek<strong class="pull-right"><?php echo $userOccuName; ?></strong></li>
                        <li>Telefon  <strong class="pull-right"><?php echo $userPhone; ?></strong></li>
                        <li>Satın Alınan Kurs Sayısı <strong class="pull-right"><?php echo $totalCourse; ?></strong></li>
                        <li>Üyelik Tipi<strong class="pull-right"><?php echo $userType; ?></strong></li>
                        <a href="course/edit" class="button_fullwidth btn-lg">Profili Düzenle</a>
                    </ul>

                </div><!-- End box-sidebar -->
            </aside><!-- End aside -->

            <div class="col-md-8">

                <!--  Tabs -->
                <ul class="nav nav-tabs" id="mytabs">
                    <li class="active"><a href="#profile_teacher" data-toggle="tab">Profilim</a></li>
                    <li><a href="#courses" data-toggle="tab">Öğrenci Olarak Kurslarım</a></li>
                    <?php if($userType === "Yönetici" || $userType === "Öğretmen")
                    { ?>
                        <li><a href="#myGivingCourses" data-toggle="tab">Öğretmen olarak Kurslarım</a></li>
                        <li><a href="#myDashboard" data-toggle="tab">Yönetim Panelim</a></li>
                    <?php }
                    ?>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="profile_teacher">
                        <h3>Hakkımda</h3>
                        <?php echo $userAbout; ?>
                    </div>

                    <div class="tab-pane fade in" id="courses">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Kurs İsmi</th>
                                    <th>Ders Sayısı</th>
                                    <th>Durum</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=0;
                                for ($i=0; $i<$totalCourse;$i++){
                                    $temp = $course["a".$i];
                                    $catagoryName=$temp["catagoryName"];
                                    $courseName=$temp["courseName"];
                                    $countLesson=$temp["countLesson"];
                                    $countCompleted=$temp["countCompleted"];
                                    $courseLink=$temp["courseLink"];
                                    $catagoryLink=$temp["catagoryLink"];

                                    $percentage=(100*$countCompleted)/$countLesson;
                                    $count++;

                                    ?>
                                    <tr>
                                        <td><a href="<?php echo "course/$catagoryLink";?>"> <?php echo  $catagoryName;?></td>
                                        <td><a href="<?php echo "course/$courseLink";?>"><?php echo $courseName;?></a></td>
                                        <td><?php echo $countLesson; ?></td>
                                        <td class="rating_2">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info myProgressBar" role="progressbar" data-percentage="<?php echo $percentage; ?>"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                ?>

                                </tbody>
                            </table>
                            <?php if($count==0) echo "Hiç kurs yok. :("; ?>
                        </div>
                    </div><!-- End tab-pane -->
                    <?php

                    if($userType === "Yönetici" ||$userType === "Öğretmen")
                    {


                        ?>
                        <div class="tab-pane fade in" id="myGivingCourses">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Kurs İsmi</th>
                                        <th>Ders Sayısı</th>
                                        <th>Durum</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count=0;
                                    for ($i=0; $i<$instructorCourseCount;$i++){
                                        $temp = $instructorCourse["a".$i];

                                        $catagoryName=$temp["catagoryName"];
                                        $courseName=$temp["courseName"];
                                        $countLesson=$temp["countLesson"];
                                        $countCompleted=$temp["countCompleted"];
                                        $courseLink=$temp["courseLink"];
                                        $catagoryLink=$temp["catagoryLink"];

                                        //Zero Division
                                        if($countLesson != 0)
                                            $percentage=(100*$countCompleted)/$countLesson;
                                        else
                                            $percentage = 0;
                                        $count++;

                                        ?>
                                        <tr>
                                            <td><a href="<?php echo "course/$catagoryLink";?>"> <?php echo  $catagoryName;?></td>
                                            <td><a href="<?php echo "course/$courseLink";?>"><?php echo $courseName;?></a></td>
                                            <td><?php echo $countLesson; ?></td>
                                            <td class="rating_2">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info myProgressBar" role="progressbar" data-percentage="<?php echo $percentage; ?>"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                    ?>

                                    </tbody>
                                </table>
                                <?php if($instructorCourseCount==0) echo "Hiç kurs yok. :("; ?>
                            </div>
                        </div><!-- End tab-pane -->

                        <div class="tab-pane fade in" id="myDashboard">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>İşlem İsmi</th>
                                        <th>Açıklaması</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="#">Kurs Ekle</a></td>
                                        <td>Bu işlem; kurs eklemenizi sağlar.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Kursu Düzenle veya Sil</a></td>
                                        <td>Bu işlem; kursunuzu düzenlemenize veya silmenize yarar.</td>
                                    </tr>
                                    <?php

                                    if($userType==="Yönetici")
                                    {
                                        ?>
                                        <tr>
                                            <td><a href="#">Kurs Onayla/Reddet</a></td>
                                            <td>Gönderilen kursları onaylayabilirsiniz veya reddetebilirsiniz.</td>
                                        </tr>
                                        <?php
                                    }

                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End tab-pane -->
                    <?php }?>

                </div>   <!-- End content-->

            </div><!-- End col-md-8-->
        </div><!-- End row-->
    </div><!-- End container -->
</section><!-- End main_content-->