
<?php
    class ratings extends CI_Model {

        /**
         * Columns of table ratings
         */
		public $courseId;
		public $stars;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_stars = false, ){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId; 
			$stars = $p_stars; 
			
            $this->db->insert("ratings", $this);
        }

        public function update($p_courseId = false, $p_stars = false, , $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;
			$stars = $p_stars != false ? $p_stars : $stars;
			
            $this->db->update("ratings", $this, $where);
        }
    }
?>
                
                
                