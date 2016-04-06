
<?php
    class comments extends CI_Model {

        /**
         * Columns of table comments
         */
		public $userId;
		public $permission;
		public $isActive;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_userId = false, $p_permission = false, $p_isActive = false){
            /**
             * Assigning values...
             */
            $userId = $p_userId;\n$permission = $p_permission;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$isActive = $p_isActive;\n

            $this->db->insert(comments, $this);
        }

        public function update($p_userId = false, $p_permission = false, $p_isActive = false, $where){
            /**
             * Assigning values...
             */
            $userId = $p_userId != false ? $p_userId : $userId;\n$permission = $p_permission != false ? $p_permission : $permission;\n$updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$isActive = $p_isActive != false ? $p_isActive : $isActive;\n

            //$this->db->insert(comments, $this);

            $this->db->update(comments, $this, $where);
        }

    }
?>
                
                
                