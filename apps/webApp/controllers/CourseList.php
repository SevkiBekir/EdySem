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
		$this->load->model('courses');
    
        
        
        $data=$this->courses->getCourseDetails(NULL,array('isActive'=>1));
		//new dBug($data);
		$i=0;
		foreach($data as $row){
			$getCatagoryName=$this->courses-> getCatagoryName($row->catagoryId);
			$getDateDifference=$this->courses->getDateDifference($row->id);
	        $data[$i]=array('courseName'=>$row->name,
	        			'courseSummary'=>$row->summary,
	        			'courseUpdatedDate'=>$row->updatedDate,
	        			'courseCatagoryName'=>$getCatagoryName->name,
	        			'coursePrice'=>$row->price,
	        			'courseDateDifference'=>$getDateDifference->days,
						
	        								);
			$i++;
		}
		
		
        new dBug($data);
       

        
        loadView('courseList',$data);
        
	}
}
