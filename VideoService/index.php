<?php
    /**
    * Schooling video güvenliği v2
    * 
    * Video güvenliği için ilk adımı AJAX ile getirtilen ve belirli timespan ve 
    * kurallar çerçevesinde çalışabilen video kesitleri oluşturabilmekti.
    * 
    * Ancak bu sunucu tarafında ffmpeg gibi, sıkıştırılmış .mp4 dosyasını işleyebilen, 
    * harici bir programa gerek duydu, ilk versiyonda basit sunucu ortamına göre aşağıdaki yöntemi tercih ettim
    * 
    * Videolar sadece bu sayfa tarafından gönderilen özel bir key için çalışabilir olacaklar,
    * bu key(şifre) sunucu tarafından anlık rastgele oluşturulup, videonun id'si istek gönderen sayfanın
    * tam linki ile birleştirilip sunucuya şifre indexi ile kaydediliyor. 
    * 
    * Üretilen şifre link olarak kullanılıp, service.php tarafında işlenip video stream ediliyor.
    * Eğer tarayıcı çubuğundan videoya erişim istenirse, oluşturulan kısa şifreli link, sistemden kaldırılıp
    * video has broken hatası verdirtiliyor. Bu gönderici sayfanın olmamayışı prensibi ile farkediliyor ve
    * videonun kendi linki sayesinde çekilebilmesi imkansızlaşıyor
    * 
    * 
    *        SERVİSİN KULLANIMI
    * 
    *   Servisin kullanımı için app/service.php dosyasının include edilmesi ve
    *   VidServHome sabitinin .htaacces dosyasının bulunduğu klasöre ayarlanması yeterli olacaktır
    *   Video linki ozelLink($videoId) fonksiyonu ile oluşturulduğu taktirde videolar çalışacaktır :) 
    *       ayrıca video tagının preload="true" olarak ayarlanması gerekmekte, bu versiyon için... 
    *   
    *   
    *   
    */
    
    include "app/service.php";
?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <center>
            <h3>Video Serving v2</h3>
            <video controls preload="auto" src="<?php echo ozelLink("video.mp4");?>" width="40%"></video>
        </center>     
    </body>
</html>