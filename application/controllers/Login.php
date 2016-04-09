<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        $id = $this->users->getUserId(post('lEmail'), post('lPassword'));
        //new dBug($this->users);
        
        if($id){
            session('userId', $id);
            
            $this->load->view('main');
        }
        else{
            $this->load->view('main');
        };
	}
}
