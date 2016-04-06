
<?php
    class posts extends CI_Model {

        /**
         * Columns of table posts
         */
		public $discussionId;
		public $userId;
		public $content;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_discussionId = false, $p_userId = false, $p_content = false, ){
            /**
             * Assigning values...
             */
            $discussionId = $p_discussionId; 
			$userId = $p_userId; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$content = $p_content; 
			
            $this->db->insert("posts", $this);
        }

        public function update($p_discussionId = false, $p_userId = false, $p_content = false, , $where){
            /**
             * Assigning values...
             */
            $discussionId = $p_discussionId != false ? $p_discussionId : $discussionId;
			$userId = $p_userId != false ? $p_userId : $userId;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$content = $p_content != false ? $p_content : $content;
			
            $this->db->update("posts", $this, $where);
        }
    }
?>
                
                
                