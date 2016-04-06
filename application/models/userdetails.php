
<?php
    class userdetails extends CI_Model {

        /**
         * Columns of table userdetails
         */
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

        public function insert($p_age = false, $p_phone = false, $p_typeId = false, $p_occupationId = false, $p_educationId = false, $p_fbUserName = false, $p_twUserName = false, $p_about = false, $p_profileImageURL = false, $p_tcNo = false, $p_address = false, $p_gender = false){
            /**
             * Assigning values...
             */
            $age = $p_age;\n$phone = $p_phone;\n$typeId = $p_typeId;\n$occupationId = $p_occupationId;\n$educationId = $p_educationId;\n$fbUserName = $p_fbUserName;\n$twUserName = $p_twUserName;\n$about = $p_about;\n$profileImageURL = $p_profileImageURL;\n$tcNo = $p_tcNo;\n$address = $p_address;\n$gender = $p_gender;\n

            $this->db->insert(userdetails, $this);
        }

        public function update($p_age = false, $p_phone = false, $p_typeId = false, $p_occupationId = false, $p_educationId = false, $p_fbUserName = false, $p_twUserName = false, $p_about = false, $p_profileImageURL = false, $p_tcNo = false, $p_address = false, $p_gender = false, $where){
            /**
             * Assigning values...
             */
            $age = $p_age != false ? $p_age : $age;\n$phone = $p_phone != false ? $p_phone : $phone;\n$typeId = $p_typeId != false ? $p_typeId : $typeId;\n$occupationId = $p_occupationId != false ? $p_occupationId : $occupationId;\n$educationId = $p_educationId != false ? $p_educationId : $educationId;\n$fbUserName = $p_fbUserName != false ? $p_fbUserName : $fbUserName;\n$twUserName = $p_twUserName != false ? $p_twUserName : $twUserName;\n$about = $p_about != false ? $p_about : $about;\n$profileImageURL = $p_profileImageURL != false ? $p_profileImageURL : $profileImageURL;\n$tcNo = $p_tcNo != false ? $p_tcNo : $tcNo;\n$address = $p_address != false ? $p_address : $address;\n$gender = $p_gender != false ? $p_gender : $gender;\n

            //$this->db->insert(userdetails, $this);

            $this->db->update(userdetails, $this, $where);
        }

    }
?>
                
                
                