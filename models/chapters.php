
<?php
    class chapters extends CI_Model {

        /**
         * Columns of table chapters
         */
		public $name;
		public $no;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_name = false, $p_no = false){
            /**
             * Assigning values...
             */
            $name = $p_name;\n$no = $p_no;\n

            $this->db->insert(chapters, $this);
        }

        public function update($p_name = false, $p_no = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;\n$no = $p_no != false ? $p_no : $no;\n

            //$this->db->insert(chapters, $this);

            $this->db->update(chapters, $this, $where);
        }

    }
?>
                
                
                