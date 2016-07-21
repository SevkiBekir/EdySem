
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class views extends EL_Model {

        /**
         * Columns of table views
         */
		public $viewerId = 0;
		public $documentId = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get viewerId from id
         */
        function getViewerId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->viewerId;
        	}
        	return false;
        }
        

        /**
         * Get documentId from id
         */
        function getDocumentId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->documentId;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_viewerId = false, $p_documentId = false){
            /**
             * Assigning values...
             */
            if (viewerId != NULL && documentId != NULL){
	            if($this->save(array("viewerId" => $p_viewerId, "documentId" => $p_documentId))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        