<?php
 /**
     * SemTech Co -> E-Learning Project
     * @2016
     * ************ T E A M ************
     * Şevki KOCADAĞ -> bekirsevki@gmail.com
     * Asim Dogan NAMLI -> asim.dogan.namli@gmail.com
     * Okan KAYA -> okankaya93@gmail.com
     * 
     */
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        $id = $this->users->getUserId(post('lEmail'), post('lPassword'));
        //new dBug($this->users);
        
        if($id){
        	$firstName = $this->users->getFName($id);
        	$lastName  = $this->users->getLName($id);
        	
            session('userId', $id);
            session('userFName', $firstName);
            session('userLName', $lastName);
            
            headerLocation('');
        }
        else{
            loadView('login');
        };
	}
}
