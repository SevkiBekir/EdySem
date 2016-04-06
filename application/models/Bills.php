
<?php
    class bills extends CI_Model {

        /**
         * Columns of table bills
         */
		public $courseId;
		public $billNo;
		public $userId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_billNo = false, $p_userId = false){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$billNo = $p_billNo; 
			$userId = $p_userId; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("bills", $this);
        }

        public function update($p_courseId = false, $p_billNo = false, $p_userId = false, $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$billNo = $p_billNo != false ? $p_billNo : $billNo;
			$userId = $p_userId != false ? $p_userId : $userId;
			
            $this->db->update("bills", $this, $where);
        }
    }
?>
                
                
                