
<?php
    class paymentprocess extends CI_Model {

        /**
         * Columns of table paymentprocess
         */
		public $userId;
		public $situation;
		public $date;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_situation = false, $p_date = false){
            /**
             * Assigning values...
             */
            $userId = $p_userId;\n$situation = $p_situation;\n$date = $p_date;\n

            $this->db->insert(paymentprocess, $this);
        }

        public function update($p_userId = false, $p_situation = false, $p_date = false, $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;\n$situation = $p_situation != false ? $p_situation : $situation;\n$date = $p_date != false ? $p_date : $date;\n

            //$this->db->insert(paymentprocess, $this);

            $this->db->update(paymentprocess, $this, $where);
        }

    }
?>
                
                
                