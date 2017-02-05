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
		//new dBug($get);
		
        $i = 0;
        $data = [];
        
		foreach($get as $row){
			$getCatagoryName = $this->courses-> getCatagoryName($row->catagoryId);
			$getDateDifference = $this->courses->getDateDifference($row->id);
			$getCourseRating = $this->courses->getCourseRating($row->id);
            $getCourseLink=$this->courses->getCourseLink($row->id)->name;
            

	        $data['a'.$i] = array('courseName'          =>  $row->name,
                                'courseSummary'         =>  $row->summary,
                                'courseUpdatedDate'     =>  $row->updatedDate,
                                'courseCatagoryName'    =>  $getCatagoryName->name,
                                'coursePrice'           =>  $row->price,
                                'courseDateDifference'  =>  $getDateDifference->days,
                                'courseRating'          =>  intval($getCourseRating->stars),
                                'courseLink'            =>  $getCourseLink,
	        			    );
	        
			$i++;
		}
        
		$myA = array('courseData'=> $data);

		$myA['countCourse'] = array('count'=>$i);
		
		$getCatagory = $this->courses->getCatagory();
        
		//new dBug($getCatagory);
		
        $i = 0;
		$data = [];
		
        foreach($getCatagory as $row){
            $getCatagoryCount = $this->courses->getCatagoryCount($row->id);

			$data['c'.$i] = array('catagoryId'=>$row->id,
								  'catagoryName'=>$row->name,
                                  'count'=>$getCatagoryCount->count
								);
			$i++;
		}
        
		$myA['catagories'] = $data;
        $myA['active'] = NULL;
        $myA['search'] = FALSE;
		
		//new dBug($myA);
		loadView('courseList', $myA);
        loadView('footer');
        
	}

    public function catagory($link = NULL){
        $this->load->model('courses');
        $catagoryId = $this->courses->getCatagoryIdFromLink($link);
        //new dBug($catagoryId->catagoryId);

        $get = $this->courses->getCourseDetails(NULL, array('isActive' => 1),$catagoryId->catagoryId);
        //new dBug($get);

        $i = 0;
        $data = [];

        foreach($get as $row){
            $getCatagoryName = $this->courses-> getCatagoryName($row->catagoryId);
            $getDateDifference = $this->courses->getDateDifference($row->id);
            $getCourseRating = $this->courses->getCourseRating($row->id);
            $getCourseLink=$this->courses->getCourseLink($row->id)->name;


            $data['a'.$i] = array('courseName'          =>  $row->name,
                'courseSummary'         =>  $row->summary,
                'courseUpdatedDate'     =>  $row->updatedDate,
                'courseCatagoryName'    =>  $getCatagoryName->name,
                'coursePrice'           =>  $row->price,
                'courseDateDifference'  =>  $getDateDifference->days,
                'courseRating'          =>  intval($getCourseRating->stars),
                'courseLink'            =>  $getCourseLink,
            );

            $i++;
        }

        $myA = array('courseData'=> $data);

        $myA['countCourse'] = array('count'=>$i);

        $getCatagory = $this->courses->getCatagory();

        //new dBug($getCatagory);

        $i = 0;
        $data = [];

        foreach($getCatagory as $row){
            $getCatagoryCount = $this->courses->getCatagoryCount($row->id);

            $data['c'.$i] = array('catagoryId'=>$row->id,
                'catagoryName'=>$row->name,
                'count'=>$getCatagoryCount->count
            );
            $i++;
        }

        $myA['catagories'] = $data;
        $myA['active'] = $link;
        $myA['search'] = FALSE;

        //new dBug($myA);
        loadView('courseList', $myA);
        loadView('footer');

    }


    public function search(){
        $get_token = get('csrf_token');
        $get_cookie = cookie('csrf_cookie');
        try{
            if(isset($get_token) && isset($get_cookie) && $get_cookie == $get_token){
                $words = get('words');
                //new dBug($words);
                $this->load->model('courses');
                $get = $this->courses->getCourseDetails(NULL, array('isActive' => 1),NULL, $words);

                $i = 0;
                $data = [];

                foreach($get as $row){
                    $getCatagoryName = $this->courses-> getCatagoryName($row->catagoryId);
                    $getDateDifference = $this->courses->getDateDifference($row->id);
                    $getCourseRating = $this->courses->getCourseRating($row->id);
                    $getCourseLink=$this->courses->getCourseLink($row->id)->name;



                    $data['a'.$i] = array('courseName'          =>  $row->name,
                        'courseSummary'         =>  $row->summary,
                        'courseUpdatedDate'     =>  $row->updatedDate,
                        'courseCatagoryName'    =>  $getCatagoryName->name,
                        'coursePrice'           =>  $row->price,
                        'courseDateDifference'  =>  $getDateDifference->days,
                        'courseRating'          =>  intval($getCourseRating->stars),
                        'courseLink'            =>  $getCourseLink,
                    );

                    $i++;
                }

                $myA = array('courseData'=> $data);

                $myA['countCourse'] = array('count'=>$i);

                $getCatagory = $this->courses->getCatagoryWithWords($words);

                //new dBug($getCatagory);

                $i = 0;
                $data = [];

                foreach($getCatagory as $row){
                    //new dBug($row->catagoryId);
                    $getCatagoryCount = $this->courses->getCatagoryCount($row->catagoryId,$words);

                    $data['c'.$i] = array('catagoryId'=>$row->catagoryId,
                        'catagoryName'=>$row->name,
                        'count'=>$getCatagoryCount->count
                    );
                    $i++;
                }

                $myA['catagories'] = $data;
                $myA['active'] = NULL;
                $myA['search'] = TRUE;
                $myA['words'] = $words;
                //new dBug($myA);
                loadView('courseList', $myA);
                loadView('footer');

                //new dBug($myA);
            }else{
                show_404();
            }
        }
        catch(Exception $e){


            show_404();
        }
    }

    public function searchCat($link){
        $get_token = get('csrf_token');
        $get_cookie = cookie('csrf_cookie');
        try{
            if(isset($get_token) && isset($get_cookie) && $get_cookie == $get_token){
                $words = get('words');
                $this->load->model('courses');

                $catagoryId = $this->courses->getCatagoryIdFromLink($link);
                //new dBug($catagoryId->catagoryId);

                $get = $this->courses->getCourseDetails(NULL, array('isActive' => 1),$catagoryId->catagoryId,$words);



                $i = 0;
                $data = [];

                foreach($get as $row){
                    $getCatagoryName = $this->courses-> getCatagoryName($row->catagoryId);
                    $getDateDifference = $this->courses->getDateDifference($row->id);
                    $getCourseRating = $this->courses->getCourseRating($row->id);
                    $getCourseLink=$this->courses->getCourseLink($row->id)->name;



                    $data['a'.$i] = array('courseName'          =>  $row->name,
                        'courseSummary'         =>  $row->summary,
                        'courseUpdatedDate'     =>  $row->updatedDate,
                        'courseCatagoryName'    =>  $getCatagoryName->name,
                        'coursePrice'           =>  $row->price,
                        'courseDateDifference'  =>  $getDateDifference->days,
                        'courseRating'          =>  intval($getCourseRating->stars),
                        'courseLink'            =>  $getCourseLink,
                    );

                    $i++;
                }

                $myA = array('courseData'=> $data);
                $i = $this->courses->getCatagoryCount(NULL,$words);

                $myA['countCourse'] = array('count'=>$i->count);

                $getCatagory = $this->courses->getCatagoryWithWords($words);

                //new dBug($getCatagory);

                $i = 0;
                $data = [];

                foreach($getCatagory as $row){
                    //new dBug($row->catagoryId);
                    $getCatagoryCount = $this->courses->getCatagoryCount($row->catagoryId,$words);

                    $data['c'.$i] = array('catagoryId'=>$row->catagoryId,
                        'catagoryName'=>$row->name,
                        'count'=>$getCatagoryCount->count
                    );
                    $i++;
                }

                $myA['catagories'] = $data;
                $myA['active'] = $link;
                $myA['search'] = TRUE;
                $myA['words'] = $words;
                 //new dBug($myA);
                loadView('courseList', $myA);
                loadView('footer');

                //new dBug($myA);
            }else{
                show_404();
            }
        }
        catch(Exception $e){


            show_404();
        }
    }
}
