
<?php
    class paymentProcess extends CI_Model {

        /**
         * Columns of table paymentProcess
         */
		public $courseId;
		public $situation;
		public $date;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_situation = false, $p_date = false){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$situation = $p_situation; 
			$date = $p_date; 
			
            $this->db->insert("paymentProcess", $this);
        }

        public function update($p_courseId = false, $p_situation = false, $p_date = false, $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$situation = $p_situation != false ? $p_situation : $situation;
			$date = $p_date != false ? $p_date : $date;
			
            $this->db->update("paymentProcess", $this, $where);
        }
    }
?>
                
                
                