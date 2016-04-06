
<?php
    class lessons extends CI_Model {

        /**
         * Columns of table lessons
         */
		public $chapterId;
		public $name;
		public $duration;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_chapterId = false, $p_name = false, $p_duration = false){
            /**
             * Assigning values...
             */
            $chapterId = $p_chapterId; 
			$name = $p_name; 
			$duration = $p_duration; 
			
            $this->db->insert("lessons", $this);
        }

        public function update($p_chapterId = false, $p_name = false, $p_duration = false, $where){
            /**
             * Assigning values...
             */
            $chapterId = $p_chapterId != false ? $p_chapterId : $chapterId;
			$name = $p_name != false ? $p_name : $name;
			$duration = $p_duration != false ? $p_duration : $duration;
			
            $this->db->update("lessons", $this, $where);
        }
    }
?>
                
                
                