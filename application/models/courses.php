
<?php
    class courses extends CI_Model {

        /**
         * Columns of table courses
         */
		public $name;
		public $catagoryId;
		public $price;
		public $isActive;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_name = false, $p_catagoryId = false, $p_price = false, $p_isActive = false){
            /**
             * Assigning values...
             */
            $name = $p_name;\n$catagoryId = $p_catagoryId;\n$price = $p_price;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$isActive = $p_isActive;\n

            $this->db->insert(courses, $this);
        }

        public function update($p_name = false, $p_catagoryId = false, $p_price = false, $p_isActive = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;\n$catagoryId = $p_catagoryId != false ? $p_catagoryId : $catagoryId;\n$price = $p_price != false ? $p_price : $price;\n$updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$isActive = $p_isActive != false ? $p_isActive : $isActive;\n

            //$this->db->insert(courses, $this);

            $this->db->update(courses, $this, $where);
        }

    }
?>
                
                
                