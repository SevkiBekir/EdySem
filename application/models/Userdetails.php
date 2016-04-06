
<?php
    class userdetails extends CI_Model {

        /**
         * Columns of table userdetails
         */
		public $userId;
		public $age;
		public $phone;
		public $typeId;
		public $occupationId;
		public $educationId;
		public $fbUserName;
		public $twUserName;
		public $about;
		public $profileImageURL;
		public $tcNo;
		public $address;
		public $gender;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_age = false, $p_phone = false, $p_typeId = false, $p_occupationId = false, $p_educationId = false, $p_fbUserName = false, $p_twUserName = false, $p_about = false, $p_profileImageURL = false, $p_tcNo = false, $p_address = false$p_gender = false, ){
            /**
             * Assigning values...
             */
            $userId = $p_userId; 
			$age = $p_age; 
			$phone = $p_phone; 
			$typeId = $p_typeId; 
			$occupationId = $p_occupationId; 
			$educationId = $p_educationId; 
			$fbUserName = $p_fbUserName; 
			$twUserName = $p_twUserName; 
			$about = $p_about; 
			$profileImageURL = $p_profileImageURL; 
			$tcNo = $p_tcNo; 
			$address = $p_address; 
			$gender = $p_gender; 
			
            $this->db->insert("userdetails", $this);
        }

        public function update($p_userId = false, $p_age = false, $p_phone = false, $p_typeId = false, $p_occupationId = false, $p_educationId = false, $p_fbUserName = false, $p_twUserName = false, $p_about = false, $p_profileImageURL = false, $p_tcNo = false, $p_address = false$p_gender = false, , $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;
			$age = $p_age != false ? $p_age : $age;
			$phone = $p_phone != false ? $p_phone : $phone;
			$typeId = $p_typeId != false ? $p_typeId : $typeId;
			$occupationId = $p_occupationId != false ? $p_occupationId : $occupationId;
			$educationId = $p_educationId != false ? $p_educationId : $educationId;
			$fbUserName = $p_fbUserName != false ? $p_fbUserName : $fbUserName;
			$twUserName = $p_twUserName != false ? $p_twUserName : $twUserName;
			$about = $p_about != false ? $p_about : $about;
			$profileImageURL = $p_profileImageURL != false ? $p_profileImageURL : $profileImageURL;
			$tcNo = $p_tcNo != false ? $p_tcNo : $tcNo;
			$address = $p_address != false ? $p_address : $address;
			$gender = $p_gender != false ? $p_gender : $gender;
			
            $this->db->update("userdetails", $this, $where);
        }
    }
?>
                
                
                