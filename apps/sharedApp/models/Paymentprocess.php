
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class paymentprocess extends EL_Model {

        /**
         * Columns of table paymentprocess
         */
		public $userId = 0;
		public $courseId = 0;
		public $situation = 0;
		public $date = 0;


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
         * Get situation from id
         */
        function getSituation($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->situation;
        	}
        	return false;
        }
        

        /**
         * Get date from id
         */
        function getDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->date;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_courseId = false, $p_situation = false, $p_date = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && courseId != NULL && situation != NULL && date != NULL){
	            if($this->save(array("userId" => $p_userId, "courseId" => $p_courseId, "situation" => $p_situation, "date" => $p_date))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        