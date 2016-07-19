<?php 

class video extends CI_Controller {
    
    function out($token){
        $this->load->library('veriSifrele');
        
        $linkData = $this->verisifrele->desifrele($token); // sessionlanmış linkin tüm verisi çekiyoruz

        if(!$linkData){
            echo "404-File not Found";
            exit;
        }

        if($linkData['ref']){
            /**
             * Checking;
             *  does request has a referer?
             *  does reference page registered as token reference
             */
            if (isset($_SERVER['HTTP_REFERER']) && $linkData["ref"] == $_SERVER['HTTP_REFERER']){ // özel video adı referans koduyla beraber çıkartılıyor ve kontrol ediliyor
                /*
                 * Video stream başlatılıyor 
                 */
                header("ref3:".$linkData["path"]);
                $stream = new VideoStream($linkData["path"]);
                $stream->start();

                exit;   
            }
            else{
                /*
                 * Muhtemelen, video network üzerinden, yeniden oynatılmaya çalışılmıştır,
                 * Ya da video linki kopyalanarak, yeni tarayıcı ekranında açılmaya çalışılmıştır
                 * Biz videonun kısa linkini fesedeceğimizden, videoya erişim mümkün değil 
                 */

                $this->verisifrele->sifreSil($token);
                echo "video corrupted err:1";
                //new dBug($_SESSION);
                //session_destroy();
            }
        }
        else{
            
            $this->verisifrele->sifreSil($token);
            echo "video corrupted err:2";
        }
    }
}

?>