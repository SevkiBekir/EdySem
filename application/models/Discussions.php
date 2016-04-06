
<?php
    class discussions extends CI_Model {

        /**
         * Columns of table discussions
         */
		public $courseId;
		public $userId;
		public $title;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_userId = false, $p_title = false){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$userId = $p_userId; 
			$title = $p_title; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			
            $this->db->insert("discussions", $this);
        }

        public function update($p_courseId = false, $p_userId = false, $p_title = false, $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$userId = $p_userId != false ? $p_userId : $userId;
			$title = $p_title != false ? $p_title : $title;
			
            $this->db->update("discussions", $this, $where);
        }
    }
?>
                
                
                