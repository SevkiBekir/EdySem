<?php
/**
 * Created by PhpStorm.
 * User: sbk
 * Date: 30/01/2017
 * Time: 02:47
 */
include_once("header.php");
//
//                $query="select email from users where id=$userId";
//                $query=mysql_real_escape_string($query);
//
//
//                $runQuery=mysql_query($query);
//                while($fetchQuery=mysql_fetch_array($runQuery))
//                    $userEmail=$fetchQuery["email"];
//
//
//
//                $query="insert into paymentProcess (userId,price,courseId,situation,date) values ('$userId','$coursePrice','$sessionCourseId','Successfull Payment',NOW())";
//                $query=mysql_real_escape_string($query);
//
//                $runQuery=mysql_query($query);
//                $query="insert into courseToUser (userId, courseId,date) values ($userId,$sessionCourseId,NOW())";
//                $query=mysql_real_escape_string($query);
//
//
//                $runQuery=mysql_query($query);
//
//                $query="select email,firstName,lastName from users where typeId=3";
//                $query=mysql_real_escape_string($query);
//
//                $runQuery=mysql_query($query);
//                while($fetchQuery=mysql_fetch_array($runQuery))
//                {
//                    $adminEmail=$fetchQuery["email"];
//                    $adminFName=$fetchQuery["firstName"];
//                    $adminLName=$fetchQuery["lastName"];
//
//                    $headers = 'From:info@sevkikocadag.com'. "\r\n" .'X-Mailer: PHP/' . phpversion();
//                    $Subject="Schooling-New Payment";
//                    $Message="Dear ".$adminFName." ".$adminLName."\n\n".
//                        "Schooling got a new payment. Information is below:\n".
//                        "Name: ".$userFName." ".$userLName."\n".
//                        "Email Address: ".$userEmail."\n\n".
//                        "Course Information:".
//                        "Course Name: ".$courseName."\n".
//                        "Price: ".$coursePrice."\n\n\n".
//                        "Schooling Team";
//                    mail($adminEmail,$Subject,$Message,$headers);
//
//                }
//                $headers = 'From:info@sevkikocadag.com'. "\r\n" .'X-Mailer: PHP/' . phpversion();
//                $Subject="Schooling-$courseName Payment Information";
//                $Message="Dear ".$userFName." ".$userLName."\n\n".
//                    "You bought a new course. Information is below:\n".
//                    "Your First name and Last name: ".$userFName." ".$userLName."\n".
//                    "Email Address: ".$userEmail."\n\n".
//                    "Course Information:".
//                    "Course Name: ".$courseName."\n".
//                    "Price: ".$coursePrice."\n\n\n".
//                    "Thank you.\n".
//                    "Schooling Team";
//                mail($userEmail,$Subject,$Message,$headers)
if($isSuccessful){
?>
                <section id="main_content">
                    <div class="container">

                        <div class="box_style_1 text-center">
                            <h4 style="color:green;">BAŞARILI!<i class="icon-ok"></i> </h4>
                            <p>Başarılı bir şekilde kursu satın aldınız. Size kurs faturasını email yolu ile gönderdik.</p>
                            <p>Şimdi 5 saniye içerisinde kursunuza yönlendirileceksiniz.</p>
                            <p>Teşekkürler!</p>
                            <p>EdySem Takımı</p>
                        </div>
                    </div>
                </section>
                <?php MetaRefresh("/course/".$courseLink,6);
}else{
                ?>



                <section id="main_content">
                    <div class="container">

                        <div class="box_style_1 text-center">
                            <h4 style="color:red;">! ! KREDİ KARTI BİLGİLERİ YANLIŞ ! ! <i class="icon-remove"></i> </h4>
                            <p>Kursu satın alamadınız. Lütfen kredi kartı bilgilerinizi kontrol ediniz.</p>
                            <p>Şimdi 3 saniye içerisinde kursunuza yönlendirileceksiniz. </p>
                            <p>EdySem Takımı</p>
                        </div>
                    </div>
                </section>

<?php
    MetaRefresh("/course/".$courseLink."/payment",30);
}
    ?>