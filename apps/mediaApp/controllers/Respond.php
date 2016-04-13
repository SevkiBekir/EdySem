<?php 

class respond extends CI_Controller {
    
	public function index($asset){
		header('content-type: '.getMimeType($asset));
        
        readfile('assets/'.$asset);
    }
    
    
}

?>