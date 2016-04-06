
<?php
    class comments extends CI_Model {

        /**
         * Columns of table comments
         */
		public $courseId;
		public $userId;
		public $permission;
		public $isActive;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_userId = false, $p_permission = false, $p_isActive = false, ){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$userId = $p_userId; 
			$permission = $p_permission; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$isActive = $p_isActive; 
			
            $this->db->insert("comments", $this);
        }

        public function update($p_courseId = false, $p_userId = false, $p_permission = false, $p_isActive = false, , $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$userId = $p_userId != false ? $p_userId : $userId;
			$permission = $p_permission != false ? $p_permission : $permission;
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$isActive = $p_isActive != false ? $p_isActive : $isActive;
			
            $this->db->update("comments", $this, $where);
        }
    }
?>
                
                
                