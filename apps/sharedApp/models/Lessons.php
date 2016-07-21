
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class lessons extends EL_Model {

        /**
         * Columns of table lessons
         */
		public $typeId = 0;
		public $chapterId = 0;
		public $name = 0;
		public $duration = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get typeId from id
         */
        function getTypeId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->typeId;
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
         * Get name from id
         */
        function getName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->name;
        	}
        	return false;
        }
        

        /**
         * Get duration from id
         */
        function getDuration($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->duration;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_typeId = false, $p_chapterId = false, $p_name = false, $p_duration = false){
            /**
             * Assigning values...
             */
            if (typeId != NULL && chapterId != NULL && name != NULL && duration != NULL){
	            if($this->save(array("typeId" => $p_typeId, "chapterId" => $p_chapterId, "name" => $p_name, "duration" => $p_duration))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        