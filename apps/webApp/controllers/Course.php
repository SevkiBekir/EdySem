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

class course extends CI_Controller {
    
    public function __construct()
    {
    	parent::__construct();
    	
    }
    
	public function index($link=NULL){
        if($link==NULL)
            headerLocation("courseList");
        
        else{
            $this->load->model('courses');
            $this -> load -> model('lessons');
            
		    $getCourseId = $this -> courses -> getCourseLink(NULL,$link) -> courseId;
            
            //new dBug($getCourseId);
            $data=[];
            $getCourseDetails = $this->courses->getCourseDetails(NULL, array('isActive' => 1,'c.id' => $getCourseId));
            //new dBug($getCourseDetails);
            $data['course'] = array(
                'courseName'    =>   $getCourseDetails -> name,
                'price'         =>   $getCourseDetails -> price,
                'summary'       =>   $getCourseDetails -> summary,
                'objectives'    =>   $getCourseDetails -> objectives,
            );
            
            $getInstructorDetails = $this -> courses -> getInstructor($getCourseDetails -> instructorId);
            //new dBug($getInstructorDetails);
            
            $getEducation = $this -> courses -> getEducation($getInstructorDetails -> educationId);
            $getOccupation = $this -> courses -> getOccupation($getInstructorDetails -> occupationId);
            
            $data['instructor'] = array(
				'id'			=> 	 $getCourseDetails -> instructorId,
                'firstName'     =>   $getInstructorDetails -> firstname,
                'lastName'      =>   $getInstructorDetails -> lastname,
                'education'     =>   $getEducation -> name,
                'occupation'    =>   $getOccupation -> name,
                'username'      =>   $getInstructorDetails -> username,
            );
            
            $countLesson = $this -> lessons -> countLessons($getCourseId);
            $data['countLesson'] = $countLesson->count;
            
            $userId = $this->session->userId;
            $countCompleted = $this -> lessons -> countCompleted($userId,$getCourseId);
            $data['countCompleted']=$countCompleted->count;
			
			$getLessons = $this -> lessons -> getLessons($getCourseId);
			$dummyArray=[];
			$i=0;
			foreach ($getLessons as $row){
				
				$dummyArray['l'.$i]=array(
					'lessonId' 			=> $row -> id,
					'lessonName'		=> $row -> name,
					'lessonDuration'	=> $row -> duration,
					'lessonTypeName'	=> $row -> lessonTypeName,
					'chapterName'		=> $row -> chapterName,
					'chapterNo'			=> $row -> chapterNo,
					'getLegendName'		=> $this -> lessons -> getLegendName($userId, $row -> id)->legendName,
					'link'				=> $this -> lessons -> generateLinkAndSave($row -> name,$getCourseId, $row -> id)
				);
				$i++;
			}
			
			$data['lessons']=$dummyArray;
			
            
			$controlCourse2User=$this -> courses -> controlCourse2User($userId, $getCourseId);
			$data['controlCourse2User']=$controlCourse2User -> count;
			
			$sumDurations=$this -> lessons -> sumDurations($getCourseId);
			$data['sumDurations']=$sumDurations -> sum;
			
			
            //new dBug($data);
            
            loadView('course',$data);
            loadView('footer');
        }
	}
	
	public function payment($link){
		echo "Payment Page for '".$link."'<br/>";
		echo "<a href='";
		baseUrl(1,"/course/".$this->uri->segment(2));
		echo "'>GERİ </a>";
	}
    
    
    
}
