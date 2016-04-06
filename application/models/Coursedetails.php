
<?php
    class coursedetails extends CI_Model {

        /**
         * Columns of table coursedetails
         */
		public $courseId;
		public $summary;
		public $objectives;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_summary = false$p_objectives = false, ){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$summary = $p_summary; 
			$objectives = $p_objectives; 
			
            $this->db->insert("coursedetails", $this);
        }

        public function update($p_courseId = false, $p_summary = false$p_objectives = false, , $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$summary = $p_summary != false ? $p_summary : $summary;
			$objectives = $p_objectives != false ? $p_objectives : $objectives;
			
            $this->db->update("coursedetails", $this, $where);
        }
    }
?>
                
                
                