
<?php
    class examprocess extends CI_Model {

        /**
         * Columns of table examprocess
         */
		public $userId;
		public $isSuccess;
		public $Grade;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_isSuccess = false, $p_Grade = false){
            /**
             * Assigning values...
             */
            $userId = $p_userId; 
			$isSuccess = $p_isSuccess; 
			$Grade = $p_Grade; 
			
            $this->db->insert("examprocess", $this);
        }

        public function update($p_userId = false, $p_isSuccess = false, $p_Grade = false, $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;
			$isSuccess = $p_isSuccess != false ? $p_isSuccess : $isSuccess;
			$Grade = $p_Grade != false ? $p_Grade : $Grade;
			
            $this->db->update("examprocess", $this, $where);
        }
    }
?>
                
                
                