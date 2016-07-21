
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class documents extends EL_Model {

        /**
         * Columns of table documents
         */
		public $lessonId = 0;
		public $documentTypeId = 0;
		public $courseId = 0;
		public $createdDate = 0;
		public $updatedDate = 0;
		public $uploadedDate = 0;
		public $explanation = 0;
		public $name = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get lessonId from id
         */
        function getLessonId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->lessonId;
        	}
        	return false;
        }
        

        /**
         * Get documentTypeId from id
         */
        function getDocumentTypeId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->documentTypeId;
        	}
        	return false;
        }
        

        /**
         * Get courseId from id
         */
        function getCourseId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->courseId;
        	}
        	return false;
        }
        

        /**
         * Get createdDate from id
         */
        function getCreatedDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->createdDate;
        	}
        	return false;
        }
        

        /**
         * Get uploadedDate from id
         */
        function getUploadedDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->uploadedDate;
        	}
        	return false;
        }
        

        /**
         * Get explanation from id
         */
        function getExplanation($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->explanation;
        	}
        	return false;
        }
        

        /**
         * Get name from id
         */
        function getName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->name;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_lessonId = false, $p_documentTypeId = false, $p_courseId = false, $p_uploadedDate = false, $p_explanation = false, $p_name = false){
            /**
             * Assigning values...
             */
            if (lessonId != NULL && documentTypeId != NULL && courseId != NULL && uploadedDate != NULL && explanation != NULL && name != NULL){
	            if($this->save(array("lessonId" => $p_lessonId, "documentTypeId" => $p_documentTypeId, "courseId" => $p_courseId, "uploadedDate" => $p_uploadedDate, "explanation" => $p_explanation, "name" => $p_name))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        