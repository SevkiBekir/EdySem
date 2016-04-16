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
     * Gelen $veri'yi random şifre ile $_SESSION["şifreler"]'e $_SESSION["şifreler"][$sifre] = [$veri, $referans] olarak atar
     * $referans, sayfaların refree headeri için tasarlandı, gelen bağlantının hangi sayfadan geldiğini doğrulamak amacı güdülüyor
     * ikincil doğrulama keyi olarak görülebilir
     * 
     * @param  [string] $veri      [Anlık şifrelenecek veri]
     * @param  [int] [$len = 5]    [Arzulanan şifre uzunluğu default 5 tir]
     * @param  [string] [ref = false]    [Referans, veri güvenliği için ikinci bir doğrulama belirteci olarak düşünülebilir]                                                                
     * @return [string] [$len genişliğinde desifrele() ile çözülebilen sifre]
     */
    public function sifrele($veri, $ref = false, $len = 5){
        if (!session("şifreler")){ // $_SESSION["şifreler"] dizisinin kontrolü, kurulumu
            session("şifreler", []);
        }
        
        /**
        * Aşağıda elimizdeki $veri'nin daha önceden session'a atılıp atılmadığını kontrol ediyoruz
        * ki sistem var olan veriler için tekrar tekrar rastgele şifre üretip şişmesin
        */
        foreach (session("şifreler") as $key => $val){
            if ($val == ["veri" => $veri, "ref" => $ref]){ 
                return $key; // varmış :) direkt var olan key'i şifre olarak bastırıyoruz
            }
        }
        
        $sifre = $this->RandomString($len); // Rastgele yeni $len genişliğinde şifremiz
        
        session("şifreler", [$sifre => ["veri" => $veri, "ref" => $ref]]); // $_SESSION["şifreler"]'e atama
        
        return $sifre;
    }
    /**
     * Kullanıcıdan dönen şifrenin'in karşılığı
     * @param  [string] $sifre [Çözülecek şifre]
     * @param  [int]    $all [Dönüt formatı, false = sadece veri, true = veri ve ref array olarak]
     * @return [string|array] [Sunucunun kullanacağı veri]
     */
    public function desifrele($sifre, $all = false){
        if (!session("şifreler")){
            return $sifre;
        }
        
        $veri = isset(session("şifreler")) && isset(session("şifreler")[$sifre]) ? session("şifreler")[$sifre] : false;
        
        if (!$all){
            $veri = $veri["veri"];
            
        }
        return $veri;
    }
    /**
     * İstenen $sifreyi verisiyle siler
     * @param [[string]] $sifre [silinecek şifre]
     */
    public function sifreSil($sifre){
        session("şifreler", '');
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
                      
    /**
     * There we are creating encoded link which uniqe to reference page,
     * That means, the returned link will only work with stated page.
     * 
     * @param [string] $str      string that will encoded and than will avaible for only in created page       
     * @param [string} $selector = 's' that string is inserting between homeurl and encoded string as a command,
     *                                 its default value 's', means link will decoded, sifreli
     */
    public function ozelLink($str, $selector = 's', $ref = false){
        if($ref){
            /**
             * $ref crucial because referer page means who wants to video section, if we did not notice this,
             * videos will always work under ../VideoService/s/@pass path 
             * and other server pages did not access the video, since 
             * "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" equals to ../VideoService/s/@pass 
             * when video section urls getting encode
             */
            return baseUrl().$selector.'/'.$this->sifrele($str, $ref); 
        }
        else{
            return baseUrl().$selector.'/'.$this->sifrele($str, "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); 
        }
    }
}
?>