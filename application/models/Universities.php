
<?php
    class universities extends CI_Model {

        /**
         * Columns of table universities
         */
		public $cityId;
		public $name;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_cityId = false, $p_name = false, ){
            /**
             * Assigning values...
             */
            $cityId = $p_cityId; 
			$name = $p_name; 
			
            $this->db->insert("universities", $this);
        }

        public function update($p_cityId = false, $p_name = false, , $where){
            /**
             * Assigning values...
             */
            $cityId = $p_cityId != false ? $p_cityId : $cityId;
			$name = $p_name != false ? $p_name : $name;
			
            $this->db->update("universities", $this, $where);
        }
    }
?>
                
                
                