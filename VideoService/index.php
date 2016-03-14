<?php
    /**
    * Schooling video güvenliği ilk versiyon
    * 
    * Video güvenliği için ilk adımı AJAX ile getirtilen ve belirli timespan ve 
    * kurallar çerçevesinde çalışabilen video kesitleri oluşturabilmekti.
    * 
    * Ancak bu sunucu tarafında ffmpeg gibi, sıkıştırılmış .mp4 dosyasını işleyebilen, 
    * harici bir programa gerek duydu, ilk versiyonda basit sunucu ortamına göre aşağıdaki yöntemi tercih ettim
    * 
    * Videolar sadece bu sayfa tarafından gönderilen özel bir key için çalışabilir olacaklar,
    * bu key(şifre) sunucu tarafından anlık rastgele oluşturulacak ve sadece bir kez kullanılacak,
    * tekrar aynı key ile videoya erişim söz konusu olamayacak. Bu sayede network linki üzerinden videonun 
    * kopyalanabilmesini önleyebiliyoruz, çünkü link sadece bir kez çalışır durumda olacak.
    * 
    * Sayfa her yüklendiğinde videonun linki de değişecek, bu değişimi rastgele şifre üretip çözebilen
    * querySifrele.php ile sağlıyoruz.
    */
    
    include "querySifrele.php";

    $videoAdi = "video.mp4";

    $anlikVidSif = anlikSifre($videoAdi);

?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <video controls preload="auto" src="service.php?id=<?php echo $anlikVidSif;?>" width="20%"></video>'
    </body>
</html>