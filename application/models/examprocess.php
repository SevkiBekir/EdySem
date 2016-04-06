
<?php
    class examProcess extends CI_Model {

        /**
         * Columns of table examProcess
         */
		public $chapterId;
		public $isSuccess;
		public $Grade;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_chapterId = false, $p_isSuccess = false, $p_Grade = false){
            /**
             * Assigning values...
             */
            $chapterId = $p_chapterId; 
			$isSuccess = $p_isSuccess; 
			$Grade = $p_Grade; 
			
            $this->db->insert("examProcess", $this);
        }

        public function update($p_chapterId = false, $p_isSuccess = false, $p_Grade = false, $where){
            /**
             * Assigning values...
             */
            $chapterId = $p_chapterId != false ? $p_chapterId : $chapterId;
			$isSuccess = $p_isSuccess != false ? $p_isSuccess : $isSuccess;
			$Grade = $p_Grade != false ? $p_Grade : $Grade;
			
            $this->db->update("examProcess", $this, $where);
        }
    }
?>
                
                
                