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