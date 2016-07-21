
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class comments extends EL_Model {

        /**
         * Columns of table comments
         */
		public $userId = 0;
		public $permission = 0;
		public $courseId = 0;
		public $createdDate = 0;
		public $updatedDate = 0;
		public $isActive = 0;


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
         * Get permission from id
         */
        function getPermission($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->permission;
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
         * Get updatedDate from id
         */
        function getUpdatedDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->updatedDate;
        	}
        	return false;
        }
        

        /**
         * Get isActive from id
         */
        function getIsActive($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->isActive;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_permission = false, $p_courseId = false, $p_isActive = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && permission != NULL && courseId != NULL && isActive != NULL){
	            if($this->save(array("userId" => $p_userId, "permission" => $p_permission, "courseId" => $p_courseId, "isActive" => $p_isActive))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        