
<?php
    class bills extends CI_Model {

        /**
         * Columns of table bills
         */
		public $billNo;
		public $courseId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_billNo = false, $p_courseId = false, ){
            /**
             * Assigning values...
             */
            $billNo = $p_billNo; 
			$courseId = $p_courseId; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("bills", $this);
        }

        public function update($p_billNo = false, $p_courseId = false, , $where){
            /**
             * Assigning values...
             */
            $billNo = $p_billNo != false ? $p_billNo : $billNo;
			$courseId = $p_courseId != false ? $p_courseId : $courseId;
			
            $this->db->update("bills", $this, $where);
        }
    }
?>
                
                
                