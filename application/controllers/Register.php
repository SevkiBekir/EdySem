<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        if($this->users->register(post('rEmail'), post('rPassword1'), post('rFirstName'), post('rLastName'))==true){
	        echo "successful";
        }
        else{
	        echo "fail";
        }
        
        $this->load->view('main');
        //echo post('rEmail');
	}
}
