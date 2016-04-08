<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class phpinfopage extends CI_Controller {

	public function index()
	{
		phpinfo();
	}
}
