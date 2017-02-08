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

class login extends CI_Controller {

	public function index(){
		$this->load->model('users');
        
        $id = $this->users->getUserId(post('lEmail'), post('lPassword'));
        
        if($id){
        	$firstName = $this->users->getFName($id);
        	$lastName  = $this->users->getLName($id);
        	$username = $this->users->getUsername($id);

            session('username', $username);
            session('userFName', $firstName);
            session('userLName', $lastName);


            $data=[];
            $this->load->model('courses');

            $getUserId = $id;

            $countCourse = $this -> courses -> countCourseForUsers($getUserId)->count;
            $data['countCourse'] = $countCourse;

            if($countCourse !== 0){
                $i=0;
                $getCourse = $this -> courses -> getCourseIdFromBuyedCourses($getUserId);
                $myArray=[];
                $this -> load -> model('lessons');

                foreach ($getCourse as $row){
                    $getCourseLink = $this->courses->getCourseLink($row->courseId)->name;

                    $countLesson = $this -> lessons -> countLessons($row->courseId);
                    $countCompleted = $this -> lessons -> countCompleted($getUserId,$row->courseId);


                    $myArray['a'.$i] = array(
                        'courseName'            =>  $row->courseName,
                        'courseLink'            =>  $getCourseLink,
                        'countLesson'           =>  $countLesson->count,
                        'countCompleted'        =>  $countCompleted->count,
                    );

                    $i++;
                }

                $data['course'] = $myArray;
                session('topMenu', $data);
            }

            headerLocation("main");
        }
        else{
            loadView('login');
        };
	}
}
