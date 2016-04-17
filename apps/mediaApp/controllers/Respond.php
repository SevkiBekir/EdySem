<?php 

class respond extends CI_Controller {
    
	public function sifresiz($asset){
		header('content-type: '.getMimeType($asset));
        /**
         * The most secure and simplest way to read file as far as I now
         */
        readfile(BASEPATH.'/assets/'.$asset);
    }
    
    public function sifreli($asset){
        $this->load->library('veriSifrele');
        
        $file = $this->veriSifrele->desifrele($asset);
        
        readfile(BASEPATH.'/assets/'.$asset);
    }
}

?>