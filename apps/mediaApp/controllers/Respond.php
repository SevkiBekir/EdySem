<?php 

class respond extends CI_Controller {
    
	public function index($asset){
		header('content-type: '.getMimeType($asset));
        /**
         * The most secure and simplest way to read file as far as I now
         */
        readfile('assets/'.$asset);
    }
}

?>