
<?php
    class documents extends CI_Model {

        /**
         * Columns of table documents
         */
		public $documentTypeId;
		public $courseId;
		public $uploadedDate;
		public $explanation;
		public $name;
		public $isAsset;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_documentTypeId = false, $p_courseId = false, $p_uploadedDate = false, $p_explanation = false, $p_name = false, $p_isAsset = false){
            /**
             * Assigning values...
             */
            $documentTypeId = $p_documentTypeId; 
			$courseId = $p_courseId; 
			$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18
			$uploadedDate = $p_uploadedDate; 
			$explanation = $p_explanation; 
			$name = $p_name; 
			$isAsset = $p_isAsset; 
			
            $this->db->insert("documents", $this);
        }

        public function update($p_documentTypeId = false, $p_courseId = false, $p_uploadedDate = false, $p_explanation = false, $p_name = false, $p_isAsset = false, $where){
            /**
             * Assigning values...
             */
            $documentTypeId = $p_documentTypeId != false ? $p_documentTypeId : $documentTypeId;
			$courseId = $p_courseId != false ? $p_courseId : $courseId;
			$uploadedDate = $p_uploadedDate != false ? $p_uploadedDate : $uploadedDate;
			$explanation = $p_explanation != false ? $p_explanation : $explanation;
			$name = $p_name != false ? $p_name : $name;
			$isAsset = $p_isAsset != false ? $p_isAsset : $isAsset;
			
            $this->db->update("documents", $this, $where);
        }
    }
?>
                
                
                