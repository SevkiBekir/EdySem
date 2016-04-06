
<?php
    class discussions extends CI_Model {

        /**
         * Columns of table discussions
         */
		public $userId;
		public $title;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_title = false, ){
            /**
             * Assigning values...
             */
            $userId = $p_userId; 
			$title = $p_title; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("discussions", $this);
        }

        public function update($p_userId = false, $p_title = false, , $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;
			$title = $p_title != false ? $p_title : $title;
			
            $this->db->update("discussions", $this, $where);
        }
    }
?>
                
                
                