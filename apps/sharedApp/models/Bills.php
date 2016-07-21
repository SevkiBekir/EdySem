
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class bills extends EL_Model {

        /**
         * Columns of table bills
         */
		public $userId = 0;
		public $billNo = 0;
		public $courseId = 0;
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
         * Get billNo from id
         */
        function getBillNo($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->billNo;
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
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_billNo = false, $p_courseId = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && billNo != NULL && courseId != NULL){
	            if($this->save(array("userId" => $p_userId, "billNo" => $p_billNo, "courseId" => $p_courseId))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        