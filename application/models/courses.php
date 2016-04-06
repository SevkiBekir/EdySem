
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
            $name = $p_name; 
			$catagoryId = $p_catagoryId; 
			$price = $p_price; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$isActive = $p_isActive; 
			
            $this->db->insert("courses", $this);
        }

        public function update($p_name = false, $p_catagoryId = false, $p_price = false, $p_isActive = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;
			$catagoryId = $p_catagoryId != false ? $p_catagoryId : $catagoryId;
			$price = $p_price != false ? $p_price : $price;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$isActive = $p_isActive != false ? $p_isActive : $isActive;
			
            $this->db->update("courses", $this, $where);
        }
    }
?>
                
                
                