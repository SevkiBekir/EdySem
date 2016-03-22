<?php
    /**
    * Schooling video güvenliği v3
    * 
    * Video güvenliği için ilk adımı AJAX ile getirtilen ve belirli timespan ve 
    * kurallar çerçevesinde çalışabilen video kesitleri oluşturabilmekti.
    * 
    * Ancak bu sunucu tarafında ffmpeg gibi, sıkıştırılmış .mp4 dosyasını işleyebilen, 
    * harici bir programa gerek duydu, ilk versiyonda basit sunucu ortamına göre aşağıdaki yöntemi tercih ettim
    * 
    * Videoları sunucuda parçalamak yerine, parçalanmış ve bilgileri hazırlanmış videoları sunucuya yüklüyoruz
    * her bir küçük videoya section deniliyor, bu sectionların bilgileri sectionMap.json dosyasına yerleştiriliyor,
    * her videonun kendisine ayrı bir klasörü var ve tüm sectionlar Map ile birlikte o klasörün altında bulunuyor
    * 
    * Bu sistem videoCan.js ve service.php tarafından yönetiliyor, videoCan.js player ve videoOp oalrak ikiye
    * ayrılıyor, biri videoları birleştirirken diğeri görüntülemeyi sağlıyor...
    * 
    * İlk adımda videoCan.js sunucudan sectionMap dosyasını istiyor, sonra ise gerekli ayarlamalardan sonra
    * sırasıyla sunucudan sectionları çekiyor....
    * 
    * Sectionlar sadece bu sayfa tarafından gönderilen özel bir key için çalışabilir olacaklar,
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
    *   
    *   
    *   
    */
    
    include "app/service.php";
?>
<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="app/assets/css/style1.css" rel="stylesheet">
        <script src="app/assets/js/jquery-2.2.2.min.js" type="application/javascript"></script>
        <script src="app/assets/js/videoCan.js" type="application/javascript"></script>
    </head>

    <body onload="basla()">
        <div>
            <div id="video" src="<?php echo ozelLink('1');?>" width="160" height="96">
                <canvas id="videoReg" width="100%" height="100%">
                    Browser does not support canvas...
                </canvas>
                <div id = "controlBar">
                    <div id="stateBut">

                    </div>
                    
                </div>
            </div>
        </div>
        <div>
            <p id="framet">Frame: </p>
            <p id="secondt">Second: </p>
        </div>
    </body>
</html>