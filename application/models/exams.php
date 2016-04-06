
<?php
    class exams extends CI_Model {

        /**
         * Columns of table exams
         */
		public $InstructorId;
		public $chapterId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_InstructorId = false, $p_chapterId = false){
            /**
             * Assigning values...
             */
            $createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$InstructorId = $p_InstructorId; 
			$chapterId = $p_chapterId; 
			
            $this->db->insert("exams", $this);
        }

        public function update($p_InstructorId = false, $p_chapterId = false, $where){
            /**
             * Assigning values...
             */
            $updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$InstructorId = $p_InstructorId != false ? $p_InstructorId : $InstructorId;
			$chapterId = $p_chapterId != false ? $p_chapterId : $chapterId;
			
            $this->db->update("exams", $this, $where);
        }
    }
?>
                
                
                