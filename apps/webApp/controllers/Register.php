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

class register extends CI_Controller {

	public function index(){
		$this->load->model('users');
        // DB'de olup olmadığını kontrol ediyor.
        //TRUE-> Kayıt yap
        //FALSE->User var, Giriş yap.
        //-1->Boş gönderi yaptı.
        
        
        if(($this->users->register(post('rEmail'), post('rPassword1'), post('rFirstName'), post('rLastName'), post('rUsername'))) == 1){
			
        	
        	//echo "<script>alert('Kayıt Olundu');</script>";
        	//headerLocation('login');
            MetaRefresh("login");
	        
        }
        // FORM VALIDATION'DAN SONRA DEĞİŞECEK -> GEÇİCİ
        else if (($this->users->register(post('rEmail'), post('rPassword1'), post('rFirstName'), post('rLastName'))) == 0){
	        echo "<script>alert('Bu mail adresi sisteme kayıtlıdır.');</script>";
	        MetaRefresh('login');
        	//headerLocation('login');
        }
        else if (($this->users->register(post('rEmail'), post('rPassword1'), post('rFirstName'), post('rLastName'))) == -1){
	        //echo "<script>alert('Lütfen tüm alanları doldurunuz.');</script>";
        	
        }
        
        loadView('register');
        //echo post('rEmail');
	}
}
