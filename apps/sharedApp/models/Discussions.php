
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class discussions extends EL_Model {

        /**
         * Columns of table discussions
         */
		public $userId = 0;
		public $courseId = 0;
		public $title = 0;
		public $createdDate = 0;
		public $updatedDate = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get userId from id
         */
        function getUserId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->userId;
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
         * Get title from id
         */
        function getTitle($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->title;
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
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_courseId = false, $p_title = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && courseId != NULL && title != NULL){
	            if($this->save(array("userId" => $p_userId, "courseId" => $p_courseId, "title" => $p_title))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        