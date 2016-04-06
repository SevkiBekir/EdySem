
<?php
    class universities extends CI_Model {

        /**
         * Columns of table universities
         */
		public $name;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_name = false){
            /**
             * Assigning values...
             */
            $name = $p_name; 
			
            $this->db->insert("universities", $this);
        }

        public function update($p_name = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;
			
            $this->db->update("universities", $this, $where);
        }
    }
?>
                
                
                