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
    
        
        //COURSE DATA
        $get = $this->courses->getCourseDetails(NULL, array('isActive' => 1));
		//new dBug($data);
		
        $i = 0;
        $data = [];
        
		foreach($get as $row){
			$getCatagoryName = $this->courses-> getCatagoryName($row->catagoryId);
			$getDateDifference = $this->courses->getDateDifference($row->id);
			$getCourseRating = $this->courses->getCourseRating($row->id);
            
	        $data['a'.$i] = array('courseName'=>$row->name,
                                'courseSummary'=>$row->summary,
                                'courseUpdatedDate'=>$row->updatedDate,
                                'courseCatagoryName'=>$getCatagoryName->name,
                                'coursePrice'=>$row->price,
                                'courseDateDifference'=>$getDateDifference->days,
                                'courseRating'=>intval($getCourseRating->stars),
	        			    );
	        
			$i++;
		}
        
		$myA = array('courseData'=> $data);
		$myA['countCourse'] = array('count'=>$i);
		
		$getCatagory = $this->courses->getCatagory();
        
		new dBug($getCatagory);
		
        $i = 0;
		$data = [];
		
        foreach($getCatagory as $row){
			$data['c'.$i] = array('catagoryId'=>$row->id,
								'catagoryName'=>$row->name
								);
			$i++;
		}
        
		$myA['catagories'] = $data;
		
		
		new dBug($myA);
		loadView('courseList', $myA);
        loadView('footer');
        
	}
}
