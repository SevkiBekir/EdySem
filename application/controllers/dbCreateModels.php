<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dbCreateModels extends CI_Controller {
    
	public function index(){
		$this->load->model('dbModelCreator/createModels');
	}
}
