
<?php
    class documents extends CI_Model {

        /**
         * Columns of table documents
         */
		public $documentTypeId;
		public $lessonId;
		public $uploadedDate;
		public $explanation;
		public $name;
		public $isAsset;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_documentTypeId = false, $p_lessonId = false, $p_uploadedDate = false, $p_explanation = false, $p_name = false, $p_isAsset = false){
            /**
             * Assigning values...
             */
            $documentTypeId = $p_documentTypeId;\n$lessonId = $p_lessonId;\n$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n$uploadedDate = $p_uploadedDate;\n$explanation = $p_explanation;\n$name = $p_name;\n$isAsset = $p_isAsset;\n

            $this->db->insert(documents, $this);
        }

        public function update($p_documentTypeId = false, $p_lessonId = false, $p_uploadedDate = false, $p_explanation = false, $p_name = false, $p_isAsset = false, $where){
            /**
             * Assigning values...
             */
            $documentTypeId = $p_documentTypeId != false ? $p_documentTypeId : $documentTypeId;\n$lessonId = $p_lessonId != false ? $p_lessonId : $lessonId;\n$uploadedDate = $p_uploadedDate != false ? $p_uploadedDate : $uploadedDate;\n$explanation = $p_explanation != false ? $p_explanation : $explanation;\n$name = $p_name != false ? $p_name : $name;\n$isAsset = $p_isAsset != false ? $p_isAsset : $isAsset;\n

            //$this->db->insert(documents, $this);

            $this->db->update(documents, $this, $where);
        }

    }
?>
                
                
                