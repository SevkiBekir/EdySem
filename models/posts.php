
<?php
    class posts extends CI_Model {

        /**
         * Columns of table posts
         */
		public $userId;
		public $content;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_content = false){
            /**
             * Assigning values...
             */
            $userId = $p_userId;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$content = $p_content;\n

            $this->db->insert(posts, $this);
        }

        public function update($p_userId = false, $p_content = false, $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;\n$updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$content = $p_content != false ? $p_content : $content;\n

            //$this->db->insert(posts, $this);

            $this->db->update(posts, $this, $where);
        }

    }
?>
                
                
                