<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        $this->users->register(post('rEmail'), post('rPassword1'), post('rFirstName'), post('rLastName'));
        
        $this->load->view('main');
        //echo post('rEmail');
	}
}
