
<?php
    class coursedetails extends CI_Model {

        /**
         * Columns of table coursedetails
         */
		public $summary;
		public $objectives;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_summary = false, $p_objectives = false){
            /**
             * Assigning values...
             */
            $summary = $p_summary; 
			$objectives = $p_objectives; 
			
            $this->db->insert("coursedetails", $this);
        }

        public function update($p_summary = false, $p_objectives = false, $where){
            /**
             * Assigning values...
             */
            $summary = $p_summary != false ? $p_summary : $summary;
			$objectives = $p_objectives != false ? $p_objectives : $objectives;
			
            $this->db->update("coursedetails", $this, $where);
        }
    }
?>
                
                
                