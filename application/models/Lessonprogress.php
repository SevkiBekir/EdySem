
<?php
    class lessonprogress extends CI_Model {

        /**
         * Columns of table lessonprogress
         */
		public $lessonLegendId;
		public $userId;
		public $lessonId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_lessonLegendId = false, $p_userId = false$p_lessonId = false, ){
            /**
             * Assigning values...
             */
            $lessonLegendId = $p_lessonLegendId; 
			$userId = $p_userId; 
			$lessonId = $p_lessonId; 
			
            $this->db->insert("lessonprogress", $this);
        }

        public function update($p_lessonLegendId = false, $p_userId = false$p_lessonId = false, , $where){
            /**
             * Assigning values...
             */
            $lessonLegendId = $p_lessonLegendId != false ? $p_lessonLegendId : $lessonLegendId;
			$userId = $p_userId != false ? $p_userId : $userId;
			$lessonId = $p_lessonId != false ? $p_lessonId : $lessonId;
			
            $this->db->update("lessonprogress", $this, $where);
        }
    }
?>
                
                
                