<?php
/**
 *
 * User: sbk
 * Date: 30/01/2017
 * Time: 01:22
 */


    include_once("header.php");

    $coursePrice = $course['price'];
    $courseName = $course['courseName'];
    $courseLink = $course['courseLink'];
?>

<section id="main_content">
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="<?php baseUrl(1,"courseList");?>">Bütün Kurslar</a></li>
            <li><a href="<?php baseUrl(1,"/course/".$courseLink);?>"><?php echo $courseName; ?></a></li>
            <li class="active">Payment</li>
        </ol>

        <div class="row">

            <div class="col-md-4">
                <div class="plan text-center">


                    <h2 class="plan-title"><?php echo $courseName; ?></h2>
                    <p class="plan-price"><?php echo $coursePrice; ?></p>



                </div>


            </div><!-- End col-md-4  -->

            <div class="col-md-8" style="margin-top:10px;">
                <form method="post" action="<?php baseUrl(1,"/course/".$courseLink."/payment/process"); ?>">
                    <div class="form-group">
                        <input name="txbCCOwnerFLName" type="text" class=" form-control" value="<?php echo set_value('txbCCOwnerFLName'); ?>" placeholder="Kredi Kartı Sahibinin Adı ve Soyadı" required>
                        <span class="input-icon"><i class=" icon-profile"></i></span>
                    </div>
                    <div class="form-group">
                        <input name="txbCCNo" type="text" class=" form-control " value="<?php echo set_value('txbCCNo'); ?>" placeholder="Kredi Kartı No" required>
                        <span class="input-icon"><i class=" icon-credit-card-3"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="txbCCSecurityNo" type="password" class=" form-control " value="<?php echo set_value('txbCCSecurityNo'); ?>" placeholder="Kredi Kartı Güvenlik Kodu" required>
                                <span class="input-icon"><i class=" icon-credit-card-1"></i></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="styled-select">
                                    <select class="form-control" name="cmbCCMonth" required>
                                        <option value="S" selected>Ayı Seçiniz</option>
                                        <?php
                                        for($i=1;$i<=12;$i++)
                                            echo "<option value='$i'>$i</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="styled-select">
                                    <select class="form-control" name="cmbCCYear" required>
                                        <option value="S" selected>Yılı Seçiniz</option>
                                        <?php
                                        for($i=2017;$i<=2023;$i++)
                                            echo "<option value='$i'>$i</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div><!-- End row -->
                    <div class="form-group">
                        <div class="control-label">
                            <label class="checkbox">
                                <input type="checkbox" name="chbAgreement" value="1" required>  <a href="termsAndConditions.php" required>Hüküm ve koşulları </a>
kabul ediyorum.                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <a href="<?php baseUrl(1,"/course/".$courseLink);?>" class="form-control btn-lg button_fullwidth-2"> Kursa Geri Dön </a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="btnPayment" type="submit" class="btn-lg button_fullwidth button_subscribe_green " value="Satın Al">
                            </div>
                        </div><!-- End row -->
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                </form>
            </div>


        </div><!-- End row -->
    </div><!-- End container -->
</section>
