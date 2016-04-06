
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
            $personalName = $p_personalName;\n$personalSurname = $p_personalSurname;\n$email = $p_email;\n$telephone = $p_telephone;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n

            $this->db->insert(sems, $this);
        }

        public function update($p_personalName = false, $p_personalSurname = false, $p_email = false, $p_telephone = false, , $where){
            /**
             * Assigning values...
             */
            $personalName = $p_personalName != false ? $p_personalName : $personalName;\n$personalSurname = $p_personalSurname != false ? $p_personalSurname : $personalSurname;\n$email = $p_email != false ? $p_email : $email;\n$telephone = $p_telephone != false ? $p_telephone : $telephone;\n$updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n

            //$this->db->insert(sems, $this);

            $this->db->update(sems, $this, $where);
        }

    }
?>
                
                
                