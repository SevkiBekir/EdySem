
<?php
    class cities extends CI_Model {

        /**
         * Columns of table cities
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
            $name = $p_name;\n

            $this->db->insert(cities, $this);
        }

        public function update($p_name = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;\n

            //$this->db->insert(cities, $this);

            $this->db->update(cities, $this, $where);
        }

    }
?>
                
                
                