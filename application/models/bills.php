
<?php
    class bills extends CI_Model {

        /**
         * Columns of table bills
         */
		public $billNo;
		public $userId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_billNo = false, $p_userId = false, ){
            /**
             * Assigning values...
             */
            $billNo = $p_billNo;\n$userId = $p_userId;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n

            $this->db->insert(bills, $this);
        }

        public function update($p_billNo = false, $p_userId = false, , $where){
            /**
             * Assigning values...
             */
            $billNo = $p_billNo != false ? $p_billNo : $billNo;\n$userId = $p_userId != false ? $p_userId : $userId;\n

            //$this->db->insert(bills, $this);

            $this->db->update(bills, $this, $where);
        }

    }
?>
                
                
                