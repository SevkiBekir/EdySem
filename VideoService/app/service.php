<?php
    /**
     * @author Asım Doğan NAMLI
     *         asim.dogan.namli@gmail.com
     * 
     * videoService.php@2016 v3
     * 
     * In there we are first parsing link wihch provided from client then according to selector part of link
     * script detects what to do
     * 
     * The link must be in that structure;
     *   www.host.com/@selector/@token
     *  
     * For this version we have two selector: 'v', 'g',
     *   'v': States get video section, decoded @token states id of video section,
     *   's': States get sectionMap, decoded @token states id of video,
     *  
     * @token is encoded string by linkSifrele.php:sifrele(),
     *   to use string it will decode by linkSifrele.php:desifrele(), 
     *  
     *  To provide security, we use two step authentication to access video sections
     *   First: does @token decoded as video id,
     *   Second: does the page requested video registered as @token reference in linkSifrele.php
     */

    include_once "include/linkSifrele.php";
    include_once "include/videoStream.php"; // Dışarıdan hazır alınmıştır...
    include_once "include/dBug.php"; // Çok başarılı bulduğum basit değişken görüntüleme scripti

    define("VidServHome", "http://$_SERVER[HTTP_HOST]/Schooling/VideoService/");




    /**
    *   [[[[[[[[[[[[[ CONTROLLERS ]]]]]]]]]]]]]
    */
    


    /*
     * $_GET["v"] means client requests video section...
     */
    if (isset($_GET["v"])){
        /**
         * Checking;
         *  does request has a referer?
         *  does reference page registered as token reference
         */
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
            // sifreSil($_GET["v"]);
            echo "Video has broken. err:1";
            //new dBug($_SESSION);
            //session_destroy();
        }
    }



    /*
     * $_GET["g"] means client requests sectionMap of video...
     * 
     * For security reasons, we will first read video sectionMap then we will rewrite url's with encoded links
     */
    if (isset($_GET["s"])){
        /**
         * Checking;
         *  does request has a referer?
         *  does reference page registered as token reference
         */
        if (isset($_SERVER['HTTP_REFERER']) && desifrele($_GET["s"], true)["ref"] == $_SERVER['HTTP_REFERER']){
            // Checking whether "../videos/video#$_GET['s']/sectionMap.json" is a valid file
            if (file_exists("../videos/video#".desifrele($_GET['s'])."/sectionMap.json")){
                // Reading whole text form sectionMap.json
                $sectionMap = file_get_contents('../videos/video#'.desifrele($_GET["s"]).'/sectionMap.json');

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
                    $newUrl = ozelLink($theUrl, 'v', $_SERVER['HTTP_REFERER']);

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
            else{
                echo "video has broken. err:2";
            }
        }
        else{
            echo "video has broken. err:3";
            //new dBug($_SESSION);
        }
    }



    /**
    * testpage, that will removed
    */
    if (isset($_GET["e"])){
        include "example.php";
    }




    /**
        [[[[[[[[[[[[[ FUNCTIONS ]]]]]]]]]]]]]    
    */

    /**
     * There we are creating encoded link which uniqe to reference page,
     * That means, the returned link will only work with stated page.
     * 
     * @param [string] $str      string that will encoded and than will avaible for only in created page       
     * @param [string} $selector = 's' that string is inserting between homeurl and encoded string as a command,
     *                                 its default value 's', means link will go to video sectionMap 
     */
    function ozelLink($str, $selector = 's', $ref = false){
        if($ref){
            /**
             * $ref crucial because referer page means who wants to video section, if we did not notice this,
             * videos will always work under ../VideoService/s/@pass path 
             * and other server pages did not access the video, since 
             * "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" equals to ../VideoService/s/@pass 
             * when video section urls getting encode
             */
            return VidServHome.$selector.'/'.sifrele($str, $ref); 
        }
        else{
            return VidServHome.$selector.'/'.sifrele($str, "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); 
        }
    }
    
?>