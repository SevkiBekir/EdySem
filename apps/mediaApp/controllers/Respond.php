<?php 

class respond extends CI_Controller {
    
	public function sifresiz($asset){
         $this->operate($asset);
    }
    
    public function sifreli($token){
        $this->load->library('veriSifrele');
        
        $fileData = $this->verisifrele->desifrele($token); // sessionlanmış linkin tüm verisi çekiyoruz
        
        if(!$fileData){
            echo "404-File not Found";
            exit;
        }
        
        if($fileData['ref']){
            /**
             * Checking;
             *  does request has a referer?
             *  does reference page registered as token reference
             */
            if(false){ // open/close attribute
                if (isset($_SERVER['HTTP_REFERER']) && $fileData["ref"] == $_SERVER['HTTP_REFERER']){ // özel video adı referans koduyla beraber çıkartılıyor ve kontrol ediliyor
                    /**
                     * Operate request
                     */

                    $this->operate($fileData);
                    $this->verisifrele->sifreSil($token);
                    exit;    
                }
                else{
                    /*
                     * Muhtemelen, link network üzerinden çalıştırılmak istenmiştir,
                     * Ya da link kopyalanarak, yeni tarayıcı ekranında açılmaya çalışılmıştır
                     * Biz kısa linki fesedeceğimizden, linke erişim mümkün değil 
                     */

                    $this->verisifrele->sifreSil($token);
                    echo "link corrupted err:1";
                    //new dBug($_SESSION);
                    //session_destroy();
                }
            }
            else{
                $this->operate($fileData);
            }
        }
        else{
            $this->operate($fileData);
        }
    }
    
    private function operate($fileData){
        switch($fileData['type']){
            case 'profilPhoto':
                
                break;
            case 'video':
                
                break;
            case 'media':
                header('content-type: '.getMimeType($fileData['path']));
                
                if(is_file('assets/'.$fileData['path'])){
                    readfile(FCPATH.'/assets/'.$fileData['path']);
                } 
                else{
                    echo "404-No file".$fileData['path'];
                }
                
                break;
        }
    }
}

?>