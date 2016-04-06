
<?php
    class views extends CI_Model {

        /**
         * Columns of table views
         */
		public $documentId;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_documentId = false){
            /**
             * Assigning values...
             */
            $documentId = $p_documentId; 
			
            $this->db->insert("views", $this);
        }

        public function update($p_documentId = false, $where){
            /**
             * Assigning values...
             */
            $documentId = $p_documentId != false ? $p_documentId : $documentId;
			
            $this->db->update("views", $this, $where);
        }
    }
?>
                
                
                