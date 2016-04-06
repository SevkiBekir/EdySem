
<?php
    class lessons extends CI_Model {

        /**
         * Columns of table lessons
         */
		public $name;
		public $duration;
		public $typeId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_name = false, $p_duration = false, $p_typeId = false){
            /**
             * Assigning values...
             */
            $name = $p_name; 
			$duration = $p_duration; 
			$typeId = $p_typeId; 
			
            $this->db->insert("lessons", $this);
        }

        public function update($p_name = false, $p_duration = false, $p_typeId = false, $where){
            /**
             * Assigning values...
             */
            $name = $p_name != false ? $p_name : $name;
			$duration = $p_duration != false ? $p_duration : $duration;
			$typeId = $p_typeId != false ? $p_typeId : $typeId;
			
            $this->db->update("lessons", $this, $where);
        }
    }
?>
                
                
                