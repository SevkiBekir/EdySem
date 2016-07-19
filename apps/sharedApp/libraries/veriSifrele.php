<?php
    /**
     * Asım Doğan NAMLI
     * asim.dogan.namli@gmail.com 
     * querySifreleme@2014
     * veriShortener@2016
     * veriSifrele@2016
     * 
     * Veri şifreleme: Asıl amaç, istemciye gönderilen verilerin, tekrar sunucuya geri dönecekse, kısaltılmasını
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
    /*
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }*/
class VeriSifrele{
    /**
     * Gelen $veri'yi random şifre ile $_SESSION["şifreler"]'e $_SESSION["şifreler"][$sifre] = $veri olarak atar
     * ikincil doğrulama keyi olarak görülebilir
     * 
     * @param  [string] $veri      [Anlık şifrelenecek veri]
     * @param  [int] [$len = 5]    [Arzulanan şifre uzunluğu default 5 tir]                                                              
     * @return [string] [$len genişliğinde desifrele() ile çözülebilen sifre]
     */
    public function sifrele($veri, $len = 5){
        if (!session("şifreler")){ // $_SESSION["şifreler"] dizisinin kontrolü, kurulumu
            session("şifreler", []);
        }
        
        /**
        * Aşağıda elimizdeki $veri'nin daha önceden session'a atılıp atılmadığını kontrol ediyoruz
        * ki sistem var olan veriler için tekrar tekrar rastgele şifre üretip şişmesin
        */
        $sessArr = session("şifreler");
        if($sessArr){
            foreach ($sessArr as $key => $val){
                if ($val == $veri){ 
                    return $key; // varmış :) direkt var olan key'i şifre olarak bastırıyoruz
                }
            }
        }
        
        $sifre = $this->RandomString($len); // Rastgele yeni $len genişliğinde şifremiz
        
        $sessArr[$sifre] = $veri;
        
        session("şifreler", $sessArr); // $_SESSION["şifreler"]'e atama
        
        return $sifre;
    }
    
    
    /**
     * Kullanıcıdan dönen şifrenin'in karşılığı
     * @param  [string] $sifre [Çözülecek şifre]
     * @return [string|array] [Sunucunun kullanacağı veri]
     */
    public function desifrele($sifre){
        if (!session("şifreler")){
            return $sifre;
        }
        
        $veri = session("şifreler") && isset(session("şifreler")[$sifre]) ? session("şifreler")[$sifre] : false;
        
        return $veri;
    }
    
    
    /**
     * İstenen $sifreyi verisiyle siler // DENENMEDİ !!!
     * @param [[string]] $sifre [silinecek şifre]
     */
    public function sifreSil($sifre){
        $sifArr = session("şifreler");
        foreach ($sifArr as $key => $val){
            if ($key == $sifre){ 
                unset($sifArr[$key]);
            }
        }
        session("şifreler", $sifArr);
    }
    
    
    /**
     * Alfanumerik istenen uzunlukta şifre oluşturma
     * 
     * @param  [int] [$length = 5] [istenen şifre uzunluğu]
     * @return [string] [yeni şifre]
     */
    public function randomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return $random;
    }
}
?>