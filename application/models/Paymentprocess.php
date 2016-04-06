
<?php
    class paymentprocess extends CI_Model {

        /**
         * Columns of table paymentprocess
         */
		public $courseId;
		public $userId;
		public $situation;
		public $date;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_userId = false, $p_situation = false$p_date = false, ){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$userId = $p_userId; 
			$situation = $p_situation; 
			$date = $p_date; 
			
            $this->db->insert("paymentprocess", $this);
        }

        public function update($p_courseId = false, $p_userId = false, $p_situation = false$p_date = false, , $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$userId = $p_userId != false ? $p_userId : $userId;
			$situation = $p_situation != false ? $p_situation : $situation;
			$date = $p_date != false ? $p_date : $date;
			
            $this->db->update("paymentprocess", $this, $where);
        }
    }
?>
                
                
                