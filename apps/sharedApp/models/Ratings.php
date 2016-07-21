
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class ratings extends EL_Model {

        /**
         * Columns of table ratings
         */
		public $courseId = 0;
		public $stars = 0;


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
         * Get stars from id
         */
        function getStars($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->stars;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_courseId = false, $p_stars = false){
            /**
             * Assigning values...
             */
            if (courseId != NULL && stars != NULL){
	            if($this->save(array("courseId" => $p_courseId, "stars" => $p_stars))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        