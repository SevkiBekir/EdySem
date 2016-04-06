
<?php
    class iptables extends CI_Model {

        /**
         * Columns of table iptables
         */
		public $IP;
		public $where;
		public $date;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_IP = false, $p_where = false, $p_date = false){
            /**
             * Assigning values...
             */
            $IP = $p_IP;\n$where = $p_where;\n$date = $p_date;\n

            $this->db->insert(iptables, $this);
        }

        public function update($p_IP = false, $p_where = false, $p_date = false, $where){
            /**
             * Assigning values...
             */
            $IP = $p_IP != false ? $p_IP : $IP;\n$where = $p_where != false ? $p_where : $where;\n$date = $p_date != false ? $p_date : $date;\n

            //$this->db->insert(iptables, $this);

            $this->db->update(iptables, $this, $where);
        }

    }
?>
                
                
                