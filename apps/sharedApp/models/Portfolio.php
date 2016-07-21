
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class portfolio extends EL_Model {

        /**
         * Columns of table portfolio
         */
		public $userId = 0;
		public $documentTypeId = 0;
		public $name = 0;


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
         * Get documentTypeId from id
         */
        function getDocumentTypeId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->documentTypeId;
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
        
        
        public function newRecord($p_userId = false, $p_documentTypeId = false, $p_name = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && documentTypeId != NULL && name != NULL){
	            if($this->save(array("userId" => $p_userId, "documentTypeId" => $p_documentTypeId, "name" => $p_name))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        