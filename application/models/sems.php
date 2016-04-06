
<?php
    class sems extends CI_Model {

        /**
         * Columns of table sems
         */
		public $personalName;
		public $personalSurname;
		public $email;
		public $telephone;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_personalName = false, $p_personalSurname = false, $p_email = false, $p_telephone = false, ){
            /**
             * Assigning values...
             */
            $personalName = $p_personalName; 
			$personalSurname = $p_personalSurname; 
			$email = $p_email; 
			$telephone = $p_telephone; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("sems", $this);
        }

        public function update($p_personalName = false, $p_personalSurname = false, $p_email = false, $p_telephone = false, , $where){
            /**
             * Assigning values...
             */
            $personalName = $p_personalName != false ? $p_personalName : $personalName;
			$personalSurname = $p_personalSurname != false ? $p_personalSurname : $personalSurname;
			$email = $p_email != false ? $p_email : $email;
			$telephone = $p_telephone != false ? $p_telephone : $telephone;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->update("sems", $this, $where);
        }
    }
?>
                
                
                