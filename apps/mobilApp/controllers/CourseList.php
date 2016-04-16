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

class courseList extends CI_Controller {

	public function index(){
		if($this->msessions->session('userId')){
            $this->load->model('courses');
            // DB'de olup olmadığını kontrol ediyor.
            //TRUE-> Kayıt yap
            //FALSE->User var, Giriş yap.
            //-1->Boş gönderi yaptı.

            $this->courses->getCourseDetails(1);

            loadView('courseList');
            //echo post('rEmail');   
        }
	}
}
