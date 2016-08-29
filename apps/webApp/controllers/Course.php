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
            new dBug($getCourseDetails);
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
				);
				$i++;
			}
			
			$data['lessons']=$dummyArray;
			
            $data['countCompleted']=$countCompleted->count;
            new dBug($data);
            
            loadView('course',$data);
            loadView('footer');
        }
	}
    
    
    
}
