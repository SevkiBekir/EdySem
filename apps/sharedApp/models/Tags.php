
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class tags extends EL_Model {

        /**
         * Columns of table tags
         */
		public $lessonId = 0;
		public $name = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

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
         * Get name from id
         */
        function getName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->name;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_lessonId = false, $p_name = false){
            /**
             * Assigning values...
             */
            if (lessonId != NULL && name != NULL){
	            if($this->save(array("lessonId" => $p_lessonId, "name" => $p_name))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        