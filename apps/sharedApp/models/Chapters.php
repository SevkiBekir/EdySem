
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class chapters extends EL_Model {

        /**
         * Columns of table chapters
         */
		public $courseId = 0;
		public $name = 0;
		public $no = 0;


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
         * Get name from id
         */
        function getName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->name;
        	}
        	return false;
        }
        

        /**
         * Get no from id
         */
        function getNo($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->no;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_courseId = false, $p_name = false, $p_no = false){
            /**
             * Assigning values...
             */
            if (courseId != NULL && name != NULL && no != NULL){
	            if($this->save(array("courseId" => $p_courseId, "name" => $p_name, "no" => $p_no))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        