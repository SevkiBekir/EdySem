<?php
    /**
    * Anlık olarak şifrenmiş video adını querySifrele.php:desifrele() ile çözerek video stream başlatıyoruz.
    * 
    * videoStream() sınıfı başka bir kaynaktan alınmıştır.
    */

    include "querySifrele.php";
    include "VideoStream.php";

    if (isset($_GET["id"])){
        $stream = new VideoStream("Assets/videos/".desifrele($_GET["id"]));
       
        //sifreSil($_GET["id"]); // desifrelenen id(şifre)'nin tekrar kullanılmasını istemediğimizden siliyoruz. Güvenliği bu sağlıyor :D
        
        $stream->start();
        exit; 
    }
    
?>