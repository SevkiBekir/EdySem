
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class sems extends EL_Model {

        /**
         * Columns of table sems
         */
		public $universityId = 0;
		public $personalName = 0;
		public $personalSurname = 0;
		public $email = 0;
		public $telephone = 0;
		public $createdDate = 0;
		public $updatedDate = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get universityId from id
         */
        function getUniversityId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->universityId;
        	}
        	return false;
        }
        

        /**
         * Get personalName from id
         */
        function getPersonalName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->personalName;
        	}
        	return false;
        }
        

        /**
         * Get personalSurname from id
         */
        function getPersonalSurname($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->personalSurname;
        	}
        	return false;
        }
        

        /**
         * Get email from id
         */
        function getEmail($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->email;
        	}
        	return false;
        }
        

        /**
         * Get telephone from id
         */
        function getTelephone($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->telephone;
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
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_universityId = false, $p_personalName = false, $p_personalSurname = false, $p_email = false, $p_telephone = false){
            /**
             * Assigning values...
             */
            if (universityId != NULL && personalName != NULL && personalSurname != NULL && email != NULL && telephone != NULL){
	            if($this->save(array("universityId" => $p_universityId, "personalName" => $p_personalName, "personalSurname" => $p_personalSurname, "email" => $p_email, "telephone" => $p_telephone))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        