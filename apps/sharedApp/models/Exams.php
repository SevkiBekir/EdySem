
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

    //include "dbModels/Users.php";

    class exams extends EL_Model {

        /**
         * Columns of table exams
         */
		public $chapterId = 0;
		public $createdDate = 0;
		public $updatedDate = 0;
		public $instructorId = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
		/**
         * Get ExamID
         */
        function getExamId($chapter){
            //echo $password;
            if($row = $this->search(array('chapterId' => $chapter))){
                
                //new dBug($row);
        
                return $row[0]->id;
            };
            
            return false;
        }
        
        /**
         * Get InstructorId by using examID
         */
        function getInstructorId($examId){
	        if($row = $this->search(array('id' => $examId))){
		        return $row[0]->instructorId;
	        }
	        return false;
        }
        
        /**
         * Get LastName by using ID
         */
        function getChapterId($examId){
	        if($row = $this->search(array('id' => $examId))){
		        return $row[0]->chapterId;
	        }
	        return false;
        }
        
        /**
        * Register
        */
        function newRecord($chapterId, $instructorId){
        	//DAHA SONRA FORM VALIDATION OLACAK!
        	if ($chapterId != NULL && $instructorId != NULL){
	            if($this->save(array("chapterId" => $chapterId, "instructorId" => $instructorId))){
	                /// Registration is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // DEĞERLER BOŞ
            }            
            //return false;
        }
    }
?>
                
                
                