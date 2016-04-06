
<?php
    class chapters extends CI_Model {

        /**
         * Columns of table chapters
         */
		public $courseId;
		public $name;
		public $no;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_name = false$p_no = false, ){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$name = $p_name; 
			$no = $p_no; 
			
            $this->db->insert("chapters", $this);
        }

        public function update($p_courseId = false, $p_name = false$p_no = false, , $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$name = $p_name != false ? $p_name : $name;
			$no = $p_no != false ? $p_no : $no;
			
            $this->db->update("chapters", $this, $where);
        }
    }
?>
                
                
                