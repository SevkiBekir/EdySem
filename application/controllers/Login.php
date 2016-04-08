<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        $id = $this->users->getUserId(post('lEmail'), post('lPassword'));
        //new dBug($id);
        
        if($id){
            session('userId', $id);
            
            $this->load->view('Main');
        }
        else{
            $this->load->view('Main');
        };
	}
}
