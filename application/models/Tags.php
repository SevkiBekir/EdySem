
<?php
    class tags extends CI_Model {

        /**
         * Columns of table tags
         */
		public $lessonId;
		public $name;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_lessonId = false, $p_name = false, ){
            /**
             * Assigning values...
             */
            $lessonId = $p_lessonId; 
			$name = $p_name; 
			
            $this->db->insert("tags", $this);
        }

        public function update($p_lessonId = false, $p_name = false, , $where){
            /**
             * Assigning values...
             */
            $lessonId = $p_lessonId != false ? $p_lessonId : $lessonId;
			$name = $p_name != false ? $p_name : $name;
			
            $this->db->update("tags", $this, $where);
        }
    }
?>
                
                
                