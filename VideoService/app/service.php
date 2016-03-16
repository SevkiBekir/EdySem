<?php
    /**
    * Anlık olarak şifrenmiş video adını querySifrele.php:desifrele() ile çözerek video stream başlatıyoruz.
    * 
    * videoStream() sınıfı başka bir kaynaktan alınmıştır.
    */

    include "include/linkSifrele.php";
    include "include/videoStream.php"; // Dışarıdan hazır alınmıştır...

    define("VidServHome", "http://$_SERVER[HTTP_HOST]/Schooling/VideoService/");

    /*
    * Eğer $_GET['v'] bulunursa, video streaminge hazırlanılıyor 
    */
    if (isset($_GET["v"])){
        if (isset($_SERVER['HTTP_REFERER']) && desifrele($_GET["v"], true)["ref"] == $_SERVER['HTTP_REFERER']){ // özel video adı referans koduyla beraber çıkartılıyor ve kontrol ediliyor
            /*
            * Video stream başlatılıyor 
            */
            header("ref3:".desifrele($_GET["v"]));
            $stream = new VideoStream("../videos/".desifrele($_GET["v"]));
            $stream->start();
            exit;    
        }
        else{
            /*
            * Muhtemelen, video network üzerinden, yeniden oynatılmaya çalışılmıştır,
            * Ya da video linki kopyalanarak, yeni tarayıcı ekranında açılmaya çalışılmıştır
            * Biz videonun kısa linkini fesedeceğimizden, videoya erişim mümkün değil 
            */
            sifreSil($_GET["v"]);
            echo "Video has broken";
        }
    }

    if (isset($_GET["e"])){
        include "example.php";
    }

    /**
     * Sayfaya ve kullanıcıya özel kısaltılmış video linki oluşturur.
     * @param [string] $vidId [videonun veritabanında kayıtlı id'si];
     */
    function ozelLink($vidId){
        $videoAdi = $vidId;
        return VidServHome."v/".sifrele($videoAdi, "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); 
    }
    
?>