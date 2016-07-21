
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class lessonprogress extends EL_Model {

        /**
         * Columns of table lessonprogress
         */
		public $userId = 0;
		public $lessonId = 0;
		public $lessonLegendId = 0;


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
         * Get lessonId from id
         */
        function getLessonId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->lessonId;
        	}
        	return false;
        }
        

        /**
         * Get lessonLegendId from id
         */
        function getLessonLegendId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->lessonLegendId;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_lessonId = false, $p_lessonLegendId = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && lessonId != NULL && lessonLegendId != NULL){
	            if($this->save(array("userId" => $p_userId, "lessonId" => $p_lessonId, "lessonLegendId" => $p_lessonLegendId))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        