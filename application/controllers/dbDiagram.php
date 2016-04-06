<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dbDiagram extends CI_Controller {
    
	public function index()
	{
		$this->dbOut->writeDiagram();
	}
}
