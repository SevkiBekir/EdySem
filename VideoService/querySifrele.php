<?php

    /**
     * Asım Doğan NAMLI
     * asim.dogan.namli@gmail.com 
     * @2014
     * 
     * Query Şifreleme: Asıl amaç, istemciye, hiç bir şekilde, sunucuya geri dönecek komutu göndermemektir
     * 
     * Herhangi bir önceden bilinebilecek POST verisi ya da kullanıcının görmesini istemediğimiz
     * GET ya da dosya isteklerini randomString() ile rast gele bir keye atayarak $_SESSION'a kaydediyoruz
     * kullanıcıya da bu random key'i gönderiyoruz,
     * 
     * random key geri döndüğünde desifrele() ile $_SESSION["şifreler"]'den veriyi çekip işletiyoruz
     * 
     */


    // Herşeyden önce session :D
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    /**
     * Gelen $veri'yi random şifre ile $_SESSION["şifreler"]'e $_SESSION["şifreler"][$sifre] = $veri olarak atar
     * 
     * @param  [string] $veri      [Anlık şifrelenecek veri]
     * @param  [int] [$len = 5]    [Arzulanan şifre uzunluğu default 5 tir]
     * @return [string] [$len genişliğinde desifrele() ile çözülebilen sifre]
     */
    function anlikSifre($veri, $len = 5){
        if (!isset($_SESSION["şifreler"])){ // $_SESSION["şifreler"] dizisinin kontrolü, kurulumu
            $_SESSION["şifreler"] = array();
        }
        
        /**
        * Aşağıda elimizdeki $veri'nin daha önceden session'a atılıp atılmadığını kontrol ediyoruz
        * ki sistem var olan veriler için tekrar tekrar rastgele şifre üretip şişmesin
        */
        foreach ($_SESSION["şifreler"] as $key=>$val){
            if ($val == $veri){ 
                return $key; // varmış :) direkt var olan key'i şifre olarak bastırıyoruz
            }
        }
        
        $sifre = RandomString($len); // Rastgele yeni $len genişliğinde şifremiz
        
        $_SESSION["şifreler"][$sifre] = $veri; // $_SESSION["şifreler"]'e atama
        
        return $sifre;
    }

    /**
     * Kullanıcıdan dönen şifrenin'in karşılığı
     * @param  [string] $sifre [Çözülecek şifre]
     * @return [string] [Sunucunun kullanacağı veri]
     */
    function desifrele($sifre){
        if (!isset($_SESSION["şifreler"])){
            return $sifre;
        }
        
        $veri = $_SESSION["şifreler"][$sifre];
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
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
?>