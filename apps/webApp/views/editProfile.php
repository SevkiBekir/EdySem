<?php
/**
 * Created by PhpStorm.
 * User: sbk
 * Date: 11/02/2017
 * Time: 18:32
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
$userGender=$users["gender"];


$userProfileImageURL=""; // DÜZENLENECEK
?>
<section id="main_content">

    <div class="container">
        <div class="row">
            <aside class="col-md-12">
                <div class=" box_style_1 profile">
                    <form method="post" enctype="multipart/form-data" action="<?php baseUrl(1,"/profile/edit/process"); ?>">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none;"/>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center">
                                    <img style="width:200px;height:200px;" src="<?php echo $userProfileImageURL; ?>" alt="Teacher" class="img-circle styled">
                                </p>
                            </div>

                            <div class="col-md-6">
                                <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Upload Profile Image</span>
                                    <input name="fileProfileImage" type="file" class="form-control" placeholder="Upload Profile Image"/>
                                </div>
                                <p style="color:red;" class="text-center"> Only .jpg and .jpeg file extensions are supported.</p>
                            </div>

                        </div>

                        <ul>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">İsim</span>
                                    <input name="txbFirstName" type="text" class="form-control" placeholder="First Name" value="<?php echo $userFName; ?>"  required="true" />
                                    <input name="txbLastName"  type="text" class="form-control" placeholder="Last Name" value="<?php echo $userLName; ?>" required="true"/>

                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Email</span>
                                    <input name="txbEmail" type="text" class="form-control" placeholder="Email" value="<?php echo $userEmail; ?>" readonly/>
                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Şifre Değiştir</span>
                                    <input name="txbOldPassword" type="password" class="form-control" placeholder="If you change your password write old Password"/>
                                    <input name="txbNewPassword1" type="password" class="form-control" placeholder="If you change your password write new Password"/>
                                    <input name="txbNewPassword2" type="password" class="form-control" placeholder="If you change your password write new Password (Again)"/>


                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Yaş</span>
                                    <input name="txbAge" type="text" class="form-control" placeholder="Your Age" value="<?php if($userAge!='-') echo $userAge; ?>" />
                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Eğitim Seviyesi</span>
                                    <select class="form-control" name="cmbEducationLevel" required="true" >
                                        <?php
                                        foreach ($allEducation as $row){
                                            $edName = $row->name;
                                            $optionBeginning = <<< EOF

<option value="$edName"
EOF;

                                            $optionClosed = <<< EOF
>$edName</option>
EOF;

                                            echo $optionBeginning;
                                            echo $edName==$userEduName ? "selected":"";
                                            echo $optionClosed;

                                        }
                                        ?>

                                    </select>

                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Meslek</span>
                                    <select class="form-control" name="cmbOccupation" required="true">
                                        <?php
                                        foreach ($allOccupation as $row){
                                            $ocName = $row->name;
                                            $optionBeginning = <<< EOF

<option value="$ocName"
EOF;

                                            $optionClosed = <<< EOF
>$ocName</option>
EOF;

                                            echo $optionBeginning;
                                            echo $edName==$userOccuName ? "selected":"";
                                            echo $optionClosed;

                                        }
                                        ?>


                                    </select>

                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Telefon</span>
                                    <input name="txbTelephone" type="text" class="form-control" placeholder="Your Telephone" value="<?php if($userPhone!='-') echo $userPhone; ?>" />
                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">facebook.com/</span>
                                    <input name="txbFbUserName" type="text" class="form-control" placeholder="Facebook Username" value="<?php if($userFbUserName!=null) echo $userFbUserName; ?>" />
                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">twitter.com/</span>
                                    <input name="txbTwUserName" type="text" class="form-control" placeholder="Twitter Username" value="<?php if($userTwUserName!=null) echo $userTwUserName; ?>" />
                                </div>
                            </li>

                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Hakkımda</span>
                                    <textarea name="txbAbout" style="height:200px;" class="form-control" placeholder="About of You"><?php if($userAbout!='-') echo $userAbout; ?> </textarea>
                                </div>
                            </li>
                            <li>
                                <div class="input-group formSetting">
                                    <span class="input-group-addon formSetting-adon">Cinsiyet</span>
                                    <select class="form-control" name="cmbGender" required="true">
                                        <?php
                                        $genders = ['K','E'];
                                        foreach ($genders as $row){
                                            $optionBeginning = <<< EOF

<option value="$row"
EOF;
                                            $optionClosed = <<< EOF
>$row</option>
EOF;

                                            echo $optionBeginning;
                                            echo $row==$userGender ? "selected":"";
                                            echo $optionClosed;

                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-6">

                                        <a href="<?php echo baseUrl()."profile";?>" class="btn-lg button_fullwidth-2">Profile Geri Dön</a>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="submit" name="btnEdit" value="Edit" class=" btn-lg button_fullwidth"/>
                                    </div>

                                </div>

                            </li>

                        </ul>
                    </form>

                </div><!-- End box-sidebar -->
            </aside><!-- End aside -->

        </div><!-- End container -->
</section><!-- End main_content-->

