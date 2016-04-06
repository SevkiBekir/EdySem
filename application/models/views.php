
<?php
    class views extends CI_Model {

        /**
         * Columns of table views
         */
		public $viewerId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_viewerId = false){
            /**
             * Assigning values...
             */
            $viewerId = $p_viewerId; 
			
            $this->db->insert("views", $this);
        }

        public function update($p_viewerId = false, $where){
            /**
             * Assigning values...
             */
            $viewerId = $p_viewerId != false ? $p_viewerId : $viewerId;
			
            $this->db->update("views", $this, $where);
        }
    }
?>
                
                
                