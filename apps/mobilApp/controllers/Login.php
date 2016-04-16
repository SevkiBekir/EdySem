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
        
        $sessData = [];
        $output = [];
        
        $userId = $this->users->getUserId(post('lEmail'), post('lPassword'));
        //new dBug($this->users);
        
        if($userId){
        	$firstName = $this->users->getFName($userId);
        	$lastName  = $this->users->getLName($userId);
            
            $sessData = ['userId' => $userId, 'userFName' => $firstName, 'userLName' => $lastName];
            
            $sessData = $this->msessions->newSession($userId, $sessData);
            
            $output = ['login' => true, 'userFName' => $firstName, 'userLName' => $lastName, 'token' => $this->msessions->token];
            //headerLocation('');
        }
        else{
            $output = ['login' => false];
        };
        
        echo json_encode($output);
	}
}
