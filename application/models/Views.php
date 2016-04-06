
<?php
    class views extends CI_Model {

        /**
         * Columns of table views
         */
		public $documentId;
		public $viewerId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_documentId = false, $p_viewerId = false, ){
            /**
             * Assigning values...
             */
            $documentId = $p_documentId; 
			$viewerId = $p_viewerId; 
			
            $this->db->insert("views", $this);
        }

        public function update($p_documentId = false, $p_viewerId = false, , $where){
            /**
             * Assigning values...
             */
            $documentId = $p_documentId != false ? $p_documentId : $documentId;
			$viewerId = $p_viewerId != false ? $p_viewerId : $viewerId;
			
            $this->db->update("views", $this, $where);
        }
    }
?>
                
                
                