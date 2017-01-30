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
            $this -> load -> model('users');

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
				'username'		=> 	$getInstructorDetails -> username,
                'firstName'     =>   $getInstructorDetails -> firstname,
                'lastName'      =>   $getInstructorDetails -> lastname,
                'education'     =>   $getEducation -> name,
                'occupation'    =>   $getOccupation -> name,
                'username'      =>   $getInstructorDetails -> username,
            );

            $countLesson = $this -> lessons -> countLessons($getCourseId);
            $data['countLesson'] = $countLesson->count;
            
            $username = $this->session->username;
            $getUserId = $this -> users -> getUserIdWithUsername($username);
            $countCompleted = $this -> lessons -> countCompleted($getUserId,$getCourseId);
            $data['countCompleted']=$countCompleted->count;
			
			$getLessons = $this -> lessons -> getLessons($getCourseId);
			$dummyArray=[];
			$i=0;
			foreach ($getLessons as $row){

			    $getLegendName = $this -> lessons -> getLegendName($getUserId, $row -> id);


				$dummyArray['l'.$i]=array(
					'lessonId' 			=> $row -> id,
					'lessonName'		=> $row -> name,
					'lessonDuration'	=> $row -> duration,
					'lessonTypeName'	=> $row -> lessonTypeName,
					'chapterName'		=> $row -> chapterName,
					'chapterNo'			=> $row -> chapterNo,
					'getLegendName'		=> ($getLegendName == NULL)?'':$getLegendName,
					'link'				=> $this -> lessons -> generateLinkAndSave($row -> name,$getCourseId, $row -> id)
				);
				$i++;
			}
			
			$data['lessons']=$dummyArray;

            
			$controlCourse2User=$this -> courses -> controlCourse2User($getUserId, $getCourseId);
			$data['controlCourse2User']=$controlCourse2User -> count;
			
			$sumDurations=$this -> lessons -> sumDurations($getCourseId);

			$data['sumDurations']=$sumDurations -> sum;
			



            //new dBug($data);
            
            loadView('course',$data);
            loadView('footer');
        }
	}
	
	public function payment($link){
        $this->load->model('users');
        $this->load->model('courses');

        $this->load->library('form_validation');

        $data = [];
        $username = $this -> session -> username;

        $getUserId = $this -> users -> getUserIdWithUsername($username);
        $courseLink = $this->uri->segment(2);

        //userid false dönerse böyle bir user yok. birisi session düzenleme yapmış ama işe yaramaz header hemen...
        if(!$getUserId){
            headerLocation("course/".$courseLink);
        }

        $getCourseId = $this -> courses -> getCourseLink(NULL,$link) -> courseId;
        $getCourseDetails = $this->courses->getCourseDetails(NULL, array('isActive' => 1,'c.id' => $getCourseId));

        $data['course'] = array(
            'courseName'    =>   $getCourseDetails -> name,
            'price'         =>   $getCourseDetails -> price,
            'courseLink'    =>   $courseLink,
        );

        //new dBug($data);

        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );


        loadView('payment',$data);
	}

    public function process($courseLink){
        $this->load->model('courses');
        $this->load->model('users');
        $this->load->model('paymentprocess');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('txbCCOwnerFLName', 'Kredi Kartı Sahibinin Adı ve Soyadı', 'trim|required');
        $this->form_validation->set_rules('txbCCNo', 'Kredi Kartı No', 'numeric|trim|required');
        $this->form_validation->set_rules('txbCCSecurityNo', 'Kredi Kartı Güvenlik Kodu', 'numeric|trim|required');

        if($this->form_validation->run() == FALSE)
            headerLocation("/course/".$courseLink."/payment");



        $getCourseId = $this -> courses -> getCourseLink(NULL,$courseLink) -> courseId;

        $getUserId = $this -> users -> getUserIdWithUsername($this->session->username);

        //userid false dönerse böyle bir user yok. birisi session düzenleme yapmış ama işe yaramaz header hemen...
        if(!$getUserId){
            headerLocation("course/".$courseLink);
        }

        $data = [];
        $data['courseLink'] = $courseLink;

        $txbCCOwnerFLName=post('txbCCOwnerFLName');
        $txbCCNo=post('txbCCNo');
        $txbCCSecurityNo=post('txbCCSecurityNo');
        $cmbCCMonth=post('cmbCCMonth');
        $cmbCCYear=post('cmbCCYear');
        $chbAgreement=post('chbAgreement');
        $btnPayment=post('btnPayment');

        if($btnPayment == "Satın Al" && $chbAgreement == 1){
            if($txbCCNo==1234 && $txbCCSecurityNo==123 && $cmbCCMonth==1 && $cmbCCYear==2017 && $txbCCOwnerFLName=="edysem"){
                //Credit Cart Control
                $controlCourse2User=$this -> courses -> controlCourse2User($getUserId, $getCourseId);

                if(!$controlCourse2User->count){ //kayıt yok kaydet
                    if($this->paymentprocess->newRecord($getUserId,$getCourseId,"başarılı") == 1){

                        $this->load->model('coursetouser');
                        if($this->coursetouser->newRecord($getUserId,$getCourseId) == 1){
                            $data['gotoCourse'] =  baseUrl(0,"/course/".$courseLink);
                            $data['isSuccessful'] = TRUE;


                        }else{

                            echo "ders almada sorun yaşandı.";
                        }

                    }
                }else{
                    //kayıt var. etme
                    echo "ders daha önce alınmış";
                }

            }else{
                $this->paymentprocess->newRecord($getUserId,$getCourseId,"Kredi kartı bilgileri yanlış.");
                $data['isSuccessful'] = FALSE;
            }
        }else{
            headerLocation("/course/".$courseLink."/payment");
        }
        loadView("paymentResult",$data);


    }
    
    
    
}
