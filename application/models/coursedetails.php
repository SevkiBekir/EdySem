
<?php
    class courseDetails extends CI_Model {

        /**
         * Columns of table courseDetails
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
			
            $this->db->insert("courseDetails", $this);
        }

        public function update($p_summary = false, $p_objectives = false, $where){
            /**
             * Assigning values...
             */
            $summary = $p_summary != false ? $p_summary : $summary;
			$objectives = $p_objectives != false ? $p_objectives : $objectives;
			
            $this->db->update("courseDetails", $this, $where);
        }
    }
?>
                
                
                