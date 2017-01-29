
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
        
        
        public function newRecord($userId = false, $lessonId = false, $lessonLegendId = false){
            /**
             * Assigning values...
             */
            if ($userId != NULL && $lessonId != NULL && $lessonLegendId != NULL){
	            if($this->save(array("userId" => $userId, "lessonId" => $lessonId, "lessonLegendId" => $lessonLegendId))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
    }
        