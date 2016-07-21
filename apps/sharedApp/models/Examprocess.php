
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class examprocess extends EL_Model {

        /**
         * Columns of table examprocess
         */
		public $userId = 0;
		public $chapterId = 0;
		public $isSuccess = 0;
		public $Grade = 0;


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
         * Get chapterId from id
         */
        function getChapterId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->chapterId;
        	}
        	return false;
        }
        

        /**
         * Get isSuccess from id
         */
        function getIsSuccess($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->isSuccess;
        	}
        	return false;
        }
        

        /**
         * Get Grade from id
         */
        function getGrade($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->Grade;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_chapterId = false, $p_isSuccess = false, $p_Grade = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && chapterId != NULL && isSuccess != NULL && Grade != NULL){
	            if($this->save(array("userId" => $p_userId, "chapterId" => $p_chapterId, "isSuccess" => $p_isSuccess, "Grade" => $p_Grade))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        