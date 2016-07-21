
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class coursedetails extends EL_Model {

        /**
         * Columns of table coursedetails
         */
		public $courseId = 0;
		public $summary = 0;
		public $objectives = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

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
         * Get summary from id
         */
        function getSummary($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->summary;
        	}
        	return false;
        }
        

        /**
         * Get objectives from id
         */
        function getObjectives($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->objectives;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_courseId = false, $p_summary = false, $p_objectives = false){
            /**
             * Assigning values...
             */
            if (courseId != NULL && summary != NULL && objectives != NULL){
	            if($this->save(array("courseId" => $p_courseId, "summary" => $p_summary, "objectives" => $p_objectives))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        