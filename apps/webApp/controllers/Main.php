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

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('courses');
    
        
        
        $get=$this->courses->getCourseDetails(NULL,array('isActive'=>1));
		//new dBug($data);
		$i=0;
		foreach($get as $row){
			$getCatagoryName=$this->courses-> getCatagoryName($row->catagoryId);
			$getDateDifference=$this->courses->getDateDifference($row->id);
			$getCourseRating=$this->courses->getCourseRating($row->id);
	        $data['a'.$i]=array('courseName'=>$row->name,
	        			'courseSummary'=>$row->summary,
	        			'courseUpdatedDate'=>$row->updatedDate,
	        			'courseCatagoryName'=>$getCatagoryName->name,
	        			'coursePrice'=>$row->price,
	        			'courseDateDifference'=>$getDateDifference->days,
						'courseRating'=>intval($getCourseRating->stars),
	        								);
	        
			$i++;
		}
		$myA=array('data'=>$data);
		
		//new dBug($myA);
		loadView('main',$myA);
		loadView('footer');
		
	}
}
