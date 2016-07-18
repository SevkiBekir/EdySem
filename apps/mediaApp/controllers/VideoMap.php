<?php 

class videoMap extends CI_Controller {
    
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
                // Checking whether "../videos/video#$_GET['s']/sectionMap.json" is a valid file
                if (file_exists("../videos/video#".$linkData["path"]."/sectionMap.json")){
                
                    // Reading whole text form sectionMap.json
                    // !!!!!!!!!!!!
                    // !!!!!!!!!!!!
                    $sectionMap = file_get_contents('../videos/video#'.$linkData["path"].'/sectionMap.json');
                    // !!!!!!!!!!!!
                    
                    // To be sure about json quotation, replacing all ' with ";
                    $sectionMap = str_replace("'", '"', $sectionMap);

                    /**
                     * We need to change section urls with encoded values to keep security, client will request with these urls
                     */
                    $matches = null;

                    // Regex schema selects all url's
                    $returnOfReg = preg_match_all("/\"url\": \"(.+)\",/i", $sectionMap, $matches);

                    //echo "before <br>";
                    //new dbug($sectionMap);

                    /**
                     * Rewriting with encoded, unique, only work with requested paged, urls
                     */
                    foreach($matches[1] as $theUrl){
                        /**
                         * Generating new url with current referer
                         */
                        $newUrl = urlSifrele($theUrl, "video", true) //(, 'v', $_SERVER['HTTP_REFERER']);

                        // Rewrite it with old value in $sectionMap,
                        $sectionMap = str_replace($theUrl, $newUrl, $sectionMap);
                    }

                    //echo "<br> after <br>";
                    //new dbug($sectionMap);

                    /**
                     * Sending back to client as application/json document 
                     */
                    //new dBug($sectionMap);
                    $de = json_decode($sectionMap, true);
                    //new dbug($de);
                    header("Content-Type: application/json");
                    //session_destroy();
                    echo json_encode($de);
                }
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