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
include_once("sessions.php");


    //echo $userId;
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<html lang="en">

<head>
  	<meta charset="utf-8">
    <title>E-Learning Project</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php assetsUrl('img/favicon.ico'); ?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php assetsUrl('img/apple-touch-icon-57x57-precomposed.png'); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php assetsUrl('img/apple-touch-icon-72x72-precomposed.png'); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php assetsUrl('img/apple-touch-icon-114x114-precomposed.png'); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php assetsUrl('img/apple-touch-icon-144x144-precomposed.png'); ?>">
    
    <!-- CSS -->
    <link href="<?php assetsUrl('css/bootstrap.css'); ?>" rel="stylesheet">
    <link href="<?php assetsUrl('css/superfish.css'); ?>" rel="stylesheet">
    <link href="<?php assetsUrl('css/style.css'); ?> " rel="stylesheet">
    <link href="<?php assetsUrl('css/myStyle.css'); ?>" rel="stylesheet">
    <link href="<?php assetsUrl('fontello/css/fontello.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php assetsUrl('css/single_course.css'); ?>">
     <!-- color scheme css -->
    <link href="<?php assetsUrl('css/color_scheme.css'); ?>" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="<?php assetsUrl(); ?>http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?php assetsUrl(); ?>http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <a href="<?php baseUrl(); ?>" id="logo">E-Learning</a>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <div class=" pull-right">
                    <?php 
                        if($userId!=""){?>
                            <div class="row">
                                <div class="gggcol-xs-offset-2"></div>
                                <div class="col-xs-4 pull-right">
                            <?php 	
                                //include_once "connectionDB.php" ;
                                $querySearch="select id,profileImageURL from users where id='$userId'";

                                // $runQuery=mysql_query($querySearch);

                                while(false){ //$fetchQuery=mysql_fetch_array($runQuery)
                                    //$userImageProfileURL = $fetchQuery["profileImageURL"];
                                }
                            ?>
                                    <img class="img-circle img-responsive" style="width:50px;height:50px;" src="<?php assetsUrl(); ?><?php  //echo $userImageProfileURL; ?>" alt="">
                                </div>
                                <div class="col-xs-4 col-xs-push-1 hpull-right">
                                    <div class="btn-group">
                                        <a class="btn dropdown-toggle hProfileDropDown" data-toggle="dropdown" href="#">
                                    <?php echo $userFName." ".$userLName; ?>
                                    <span class="caret"></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a  href="<?php echo baseUrl()."myProfile";?>"><span class=" icon-cog"></span> My Dashboard</a></li>
                                    <li><a  href="<?php echo baseUrl()."logout";?>"><span class="icon-logout"></span> Log Out</a></li>
                                  </ul>
                                    </div>
                                 </div>
                            </div>
                    <?php }
                        else if($userId==""){?>
                        <a href="<?php echo baseUrl()."login";?>" class="button_top" id="login_top2">Giriş</a>
                        <a href="<?php echo baseUrl()."applyInstructor";?>" class="button_top hidden-xs" id="apply">Eğitmen Ol</a></div>
                        <ul id="top_nav" class="hidden-xs">
                            <li><a href="<?php echo baseUrl()."aboutUs";?>">Hakkımızda</a></li>

                            <li><a href="<?php echo baseUrl()."register";?>">Kayıt Ol</a></li>
                        </ul>
                        <?php }?>
                    <!-- end pull-right-->
                </div>
            </div>
        </div>
    </header><!-- End header -->

    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="mobnav-btn"></div>

                    <!-- Content of top menu -->
                    <ul class="sf-menu">
                        <?php include_once("subViews/topMenuItems.php"); ?>
                    </ul>

                    <div class="col-md-3 pull-right hidden-sm hidden-xs">
                            <div id="sb-search" class="sb-search">
                                <form method="get" action="courseList.php">
                                    <input class="sb-search-input" placeholder="Aramak istediğin kelimeyi gir" type="text" value="" name="search" id="search">
                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search"></span>
                                </form>
                            </div>
                      </div><!-- End search -->

                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </nav>