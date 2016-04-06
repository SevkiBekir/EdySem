
<?php
    class occupations extends CI_Model {

        /**
         * Columns of table occupations
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

            $this->db->insert(occupations, $this);
        }

        public function update($p_name = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;\n

            //$this->db->insert(occupations, $this);

            $this->db->update(occupations, $this, $where);
        }

    }
?>
                
                
                