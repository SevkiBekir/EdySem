
<?php
    class exams extends CI_Model {

        /**
         * Columns of table exams
         */
		public $questionId;
		public $InstructorId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_questionId = false, $p_InstructorId = false){
            /**
             * Assigning values...
             */
            $questionId = $p_questionId; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$InstructorId = $p_InstructorId; 
			
            $this->db->insert("exams", $this);
        }

        public function update($p_questionId = false, $p_InstructorId = false, $where){
            /**
             * Assigning values...
             */
            $questionId = $p_questionId != false ? $p_questionId : $questionId;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$InstructorId = $p_InstructorId != false ? $p_InstructorId : $InstructorId;
			
            $this->db->update("exams", $this, $where);
        }
    }
?>
                
                
                