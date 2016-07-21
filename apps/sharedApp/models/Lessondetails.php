
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class lessondetails extends EL_Model {

        /**
         * Columns of table lessondetails
         */
		public $content = 0;
		public $lessonId = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get content from id
         */
        function getContent($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->content;
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
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_content = false, $p_lessonId = false){
            /**
             * Assigning values...
             */
            if (content != NULL && lessonId != NULL){
	            if($this->save(array("content" => $p_content, "lessonId" => $p_lessonId))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        