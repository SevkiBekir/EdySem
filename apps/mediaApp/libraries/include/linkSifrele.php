<?php

    /**
     * Asım Doğan NAMLI
     * asim.dogan.namli@gmail.com 
     * querySifreleme@2014
     * veriShortener@2016
     * 
     * Veri Shortener: Asıl amaç, istemciye gönderilen verilerin, tekrar sunucuya geri dönecekse, kısaltılmasını
     * sağlarken, GET, POST gibi yöntemlerde kullanılacak verinin gizliliğinin sağlanmasıdır
     * 
     * kısaltılmak istenen veriyi session üzerine kaydederek kısaltma sağlandığından,
     * kısaltılmış linkler sadece istemciye özeldir ve her yeni session da yenilenirler,
     * 
     * arkadaki mantık ise $_SESSION üzerine "şifreler" dizi açıp, şifre => veri modelinin kullanılmasıdır,
     * sifreCöz ile ilgili sifrenin verisi hızlıca döndürülür 
     * 
     * 
     */


    // Herşeyden önce session :D
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    /**
     * Gelen $veri'yi random şifre ile $_SESSION["şifreler"]'e $_SESSION["şifreler"][$sifre] = [$veri, $referans] olarak atar
     * $referans, sayfaların refree headeri için tasarlandı, gelen bağlantının hangi sayfadan geldiğini doğrulamak amacı güdülüyor
     * ikincil doğrulama keyi olarak görülebilir
     * 
     * @param  [string] $veri      [Anlık şifrelenecek veri]
     * @param  [int] [$len = 5]    [Arzulanan şifre uzunluğu default 5 tir]
     * @param  [string] [ref = false]    [Referans, veri güvenliği için ikinci bir doğrulama belirteci olarak düşünülebilir]                                                                
     * @return [string] [$len genişliğinde desifrele() ile çözülebilen sifre]
     */
    function sifrele($veri, $ref = false, $len = 5){
        if (!isset($_SESSION["şifreler"])){ // $_SESSION["şifreler"] dizisinin kontrolü, kurulumu
            $_SESSION["şifreler"] = array();
        }
        
        /**
        * Aşağıda elimizdeki $veri'nin daha önceden session'a atılıp atılmadığını kontrol ediyoruz
        * ki sistem var olan veriler için tekrar tekrar rastgele şifre üretip şişmesin
        */
        foreach ($_SESSION["şifreler"] as $key => $val){
            if ($val == ["veri" => $veri, "ref" => $ref]){ 
                return $key; // varmış :) direkt var olan key'i şifre olarak bastırıyoruz
            }
        }
        
        $sifre = RandomString($len); // Rastgele yeni $len genişliğinde şifremiz
        
        $_SESSION["şifreler"][$sifre] = ["veri" => $veri, "ref" => $ref]; // $_SESSION["şifreler"]'e atama
        
        return $sifre;
    }

    /**
     * Kullanıcıdan dönen şifrenin'in karşılığı
     * @param  [string] $sifre [Çözülecek şifre]
     * @param  [int]    $all [Dönüt formatı, false = sadece veri, true = veri ve ref array olarak]
     * @return [string|array] [Sunucunun kullanacağı veri]
     */
    function desifrele($sifre, $all = false){
        if (!isset($_SESSION["şifreler"])){
            return $sifre;
        }
        
        $veri = isset($_SESSION["şifreler"]) && isset($_SESSION["şifreler"][$sifre]) ? $_SESSION["şifreler"][$sifre] : false;
        
        if (!$all){
            $veri = $veri["veri"];
            
        }
        return $veri;
    }

    /**
     * İstenen $sifreyi verisiyle siler
     * @param [[string]] $sifre [silinecek şifre]
     */
    function sifreSil($sifre){
        unset($_SESSION["şifreler"][$sifre]);
    }

    /**
     * Alfanumerik istenen uzunlukta şifre oluşturma
     * 
     * @param  [int] [$length = 5] [istenen şifre uzunluğu]
     * @return [string] [yeni şifre]
     */
    function randomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $random;
    }
?>