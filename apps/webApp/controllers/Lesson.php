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

class lesson extends CI_Controller {
    
    public function __construct()
    {
    	parent::__construct();
    	
    }
    
	public function index($link=NULL){
        
		$this -> load -> model('courses');
		$this -> load -> model('lessons');
		$this -> load -> model('users');

		$data=[];

		$getLessonId=$this -> lessons -> getLessonLink(NULL,$link) ->lessonId;
		$getCourseId=$this -> courses -> getCourseLink(NULL, $this->uri->segment(2))->courseId;

		
		if($getLessonId==NULL)
			headerLocation("course/".$this->uri->segment(2));
		if($getCourseId==NULL)
			headerLocation("courseList");

        $userId = $this -> users -> getUserIdWithUsername($this->session->username);

		$ControlUser2Lesson=$this -> lessons -> ControlUser2Lesson($userId,$getLessonId);
		if($ControlUser2Lesson==NULL)	
			headerLocation("course/".$this->uri->segment(2));
		
//		1-lessondan courseId çek
//		2-o course sahip olan linke yönlendirme yap.	
		// Course ismini bilse bile girememe olayı
		
		$courseLink=$this -> courses -> getCourseLink($ControlUser2Lesson->courseId) -> name;
		if($ControlUser2Lesson->courseId!=$getCourseId)
			headerLocation("course/".$courseLink);
		
		$data['ControlUser2Lesson']=$ControlUser2Lesson;
		$data['courseLink']=$courseLink;
		
		$getLessonWithContent=$this -> lessons -> getLessonWithContent($getLessonId);
		$data['getLessonWithContent']=$getLessonWithContent;
		$data['userId'] = $userId;
		$data['lessonLegendName'] = $this -> lessons -> getLegendName($userId,$getLessonId);

		
		
		
		//new dBug($data);

		loadView("lesson",$data);
		loadView("footer");

	}
	
	public function transfer($link){
        MetaRefresh("course/$link");
	}

    /**
     * Lesson completed
     *
     * @param       string  $courselink    Input $lessonlink
     *
     */
    public function completed($courselink,$lessonlink){
        $this -> load -> model('lessonprogress');
        $this -> load -> model('users');
        $this -> load -> model('lessons');

        $getLessonId=$this -> lessons -> getLessonLink(NULL,$lessonlink) ->lessonId;
        $userId = $this -> users -> getUserIdWithUsername($this->session->username);

        if($this -> lessonprogress -> newRecord($userId,$getLessonId,3) != 1){
            echo "ders tamamlandı fonks. sorun yaşandı.";
        }

        $this->transfer($courselink);
    }
	
}
