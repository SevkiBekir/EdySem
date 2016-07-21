
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class userdetails extends EL_Model {

        /**
         * Columns of table userdetails
         */
		public $typeId = 0;
		public $userId = 0;
		public $age = 0;
		public $phone = 0;
		public $occupationId = 0;
		public $educationId = 0;
		public $fbUserName = 0;
		public $twUserName = 0;
		public $about = 0;
		public $tcNo = 0;
		public $address = 0;
		public $gender = 0;


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
         * Get userId from id
         */
        function getUserId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->userId;
        	}
        	return false;
        }
        

        /**
         * Get age from id
         */
        function getAge($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->age;
        	}
        	return false;
        }
        

        /**
         * Get phone from id
         */
        function getPhone($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->phone;
        	}
        	return false;
        }
        

        /**
         * Get occupationId from id
         */
        function getOccupationId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->occupationId;
        	}
        	return false;
        }
        

        /**
         * Get educationId from id
         */
        function getEducationId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->educationId;
        	}
        	return false;
        }
        

        /**
         * Get fbUserName from id
         */
        function getFbUserName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->fbUserName;
        	}
        	return false;
        }
        

        /**
         * Get twUserName from id
         */
        function getTwUserName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->twUserName;
        	}
        	return false;
        }
        

        /**
         * Get about from id
         */
        function getAbout($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->about;
        	}
        	return false;
        }
        

        /**
         * Get tcNo from id
         */
        function getTcNo($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->tcNo;
        	}
        	return false;
        }
        

        /**
         * Get address from id
         */
        function getAddress($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->address;
        	}
        	return false;
        }
        

        /**
         * Get gender from id
         */
        function getGender($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->gender;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_typeId = false, $p_userId = false, $p_age = false, $p_phone = false, $p_occupationId = false, $p_educationId = false, $p_fbUserName = false, $p_twUserName = false, $p_about = false, $p_tcNo = false, $p_address = false, $p_gender = false){
            /**
             * Assigning values...
             */
            if (typeId != NULL && userId != NULL && age != NULL && phone != NULL && occupationId != NULL && educationId != NULL && fbUserName != NULL && twUserName != NULL && about != NULL && tcNo != NULL && address != NULL && gender != NULL){
	            if($this->save(array("typeId" => $p_typeId, "userId" => $p_userId, "age" => $p_age, "phone" => $p_phone, "occupationId" => $p_occupationId, "educationId" => $p_educationId, "fbUserName" => $p_fbUserName, "twUserName" => $p_twUserName, "about" => $p_about, "tcNo" => $p_tcNo, "address" => $p_address, "gender" => $p_gender))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        