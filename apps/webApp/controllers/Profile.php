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

/**
 * Class profile
 */
class profile extends CI_Controller {
    /**
     * profile constructor.
     */
    public function __construct()
    {
    	parent::__construct();
    	
    }

    /**
     * @param null $link
     */
    public function index($link=NULL){
        if($link==NULL){
            // Kendi profilini goster
            $this -> load -> model('users');
            $this -> load -> model('courses');


            $username = $this->session->username;
            // login kontrolu
            if (!isset($username))
                headerLocation("login");

            $data=[];
            $getUserId = $this -> users -> getUserIdWithUsername($username);
            $getUserDetails = $this->users -> getUserDetails($getUserId);

            $getEducation = $this -> courses -> getEducation($getUserDetails -> educationId);
            $getOccupation = $this -> courses -> getOccupation($getUserDetails -> occupationId);
            $countCourse = $this -> courses -> countCourseForUsers($getUserId);
            $membership = $this -> users -> getUserType($getUserDetails->typeId);

            $data['users'] = array(
                'firstname'        =>   $getUserDetails -> firstname,
                'lastname'         =>   $getUserDetails -> lastname,
                'email'            =>   $getUserDetails -> email,
                'age'              =>   $getUserDetails -> age,
                'education'        =>   $getEducation -> name,
                'occupation'       =>   $getOccupation -> name,
                'phone'            =>   $getUserDetails -> phone,
                'countCourse'      =>   $countCourse->count,
                'membership'       =>   $membership-> name,
                'about'            =>   $getUserDetails -> about,
                'facebook'         =>   $getUserDetails -> fbUserName,
                'twitter'          =>   $getUserDetails -> twUserName,

            );

            if($countCourse !== 0){
                $i=0;
                $getCourse = $this -> courses -> getCourseIdFromBuyedCourses($getUserId);
                $myArray=[];
                $this -> load -> model('lessons');

                foreach ($getCourse as $row){
                    $getCourseLink = $this->courses->getCourseLink($row->courseId)->name;
                    $getCatagoryLink = $this->courses->getCatagoryLink($row->catagoryId)->name;

                    $countLesson = $this -> lessons -> countLessons($row->courseId);
                    $countCompleted = $this -> lessons -> countCompleted($getUserId,$row->courseId);


                    $myArray['a'.$i] = array(
                        'courseName'            =>  $row->courseName,
                        'catagoryName'          =>  $row->catagoryName,
                        'catagoryLink'          =>  $getCatagoryLink,
                        'courseLink'            =>  $getCourseLink,
                        'countLesson'           =>  $countLesson->count,
                        'countCompleted'        =>  $countCompleted->count,
                    );

                    $i++;
                }

                $data['course'] = $myArray;
            }

            $getCourse = $this -> courses -> getCourseFromTaught($getUserId);

            $countCourse = $this -> courses -> countCourseForInstructors($getUserId)->count;

            if($countCourse !== 0){
                $i=0;
                $myArray=[];
                $this -> load -> model('lessons');

                foreach ($getCourse as $row){
                    $getCourseLink = $this->courses->getCourseLink($row->courseId)->name;
                    $getCatagoryLink = $this->courses->getCatagoryLink($row->catagoryId)->name;

                    $countLesson = $this -> lessons -> countLessons($row->courseId);
                    $countCompleted = $this -> lessons -> countCompleted($getUserId,$row->courseId);


                    $myArray['a'.$i] = array(
                        'courseName'            =>  $row->courseName,
                        'catagoryName'          =>  $row->catagoryName,
                        'catagoryLink'          =>  $getCatagoryLink,
                        'courseLink'            =>  $getCourseLink,
                        'countLesson'           =>  $countLesson->count,
                        'countCompleted'        =>  $countCompleted->count,
                    );

                    $i++;
                }
                $data['instructorCourse'] = $myArray;
                $data['instructorCourseCount'] = $countCourse;

            }
           // new dBug($data);

            loadView('profile',$data);
            loadView('footer');
        }
        else{
            //Baska profili goster

        }
	}

	function edit(){
        echo "edit page";
    }
	

    
    
    
}
