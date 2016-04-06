
<?php
    class lessonProgress extends CI_Model {

        /**
         * Columns of table lessonProgress
         */
		public $lessonId;
		public $lessonLegendId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_lessonId = false, $p_lessonLegendId = false){
            /**
             * Assigning values...
             */
            $lessonId = $p_lessonId; 
			$lessonLegendId = $p_lessonLegendId; 
			
            $this->db->insert("lessonProgress", $this);
        }

        public function update($p_lessonId = false, $p_lessonLegendId = false, $where){
            /**
             * Assigning values...
             */
            $lessonId = $p_lessonId != false ? $p_lessonId : $lessonId;
			$lessonLegendId = $p_lessonLegendId != false ? $p_lessonLegendId : $lessonLegendId;
			
            $this->db->update("lessonProgress", $this, $where);
        }
    }
?>
                
                
                