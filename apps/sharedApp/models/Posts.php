
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class posts extends EL_Model {

        /**
         * Columns of table posts
         */
		public $userId = 0;
		public $discussionId = 0;
		public $createdDate = 0;
		public $updatedDate = 0;
		public $content = 0;


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
         * Get discussionId from id
         */
        function getDiscussionId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->discussionId;
        	}
        	return false;
        }
        

        /**
         * Get createdDate from id
         */
        function getCreatedDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->createdDate;
        	}
        	return false;
        }
        

        /**
         * Get updatedDate from id
         */
        function getUpdatedDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->updatedDate;
        	}
        	return false;
        }
        

        /**
         * Get content from id
         */
        function getContent($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->content;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_discussionId = false, $p_content = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && discussionId != NULL && content != NULL){
	            if($this->save(array("userId" => $p_userId, "discussionId" => $p_discussionId, "content" => $p_content))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        