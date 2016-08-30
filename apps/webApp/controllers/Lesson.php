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

class lesson extends CI_Controller {
    
    public function __construct()
    {
    	parent::__construct();
    	
    }
    
	public function index($link=NULL){
        if($link==NULL)
            headerLocation("courseList");
        
        else{
			
			loadView("deneme");
		}
	}
	
	public function transfer($link){
		headerLocation("course/$link");
	}
	
	
}
