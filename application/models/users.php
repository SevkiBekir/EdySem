
<?php
    class users extends CI_Model {

        /**
         * Columns of table users
         */
		public $firstname;
		public $lastname;
		public $email;
		public $password;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_firstname = false, $p_lastname = false, $p_email = false, $p_password = false, ){
            /**
             * Assigning values...
             */
            $firstname = $p_firstname; 
			$lastname = $p_lastname; 
			$email = $p_email; 
			$password = $p_password; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("users", $this);
        }

        public function update($p_firstname = false, $p_lastname = false, $p_email = false, $p_password = false, , $where){
            /**
             * Assigning values...
             */
            $firstname = $p_firstname != false ? $p_firstname : $firstname;
			$lastname = $p_lastname != false ? $p_lastname : $lastname;
			$email = $p_email != false ? $p_email : $email;
			$password = $p_password != false ? $p_password : $password;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->update("users", $this, $where);
        }
    }
?>
                
                
                