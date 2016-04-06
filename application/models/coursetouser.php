
<?php
    class coursetouser extends CI_Model {

        /**
         * Columns of table coursetouser
         */
		public $courseId;
		public $date;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_courseId = false, $p_date = false){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId;\n$date = $p_date;\n

            $this->db->insert(coursetouser, $this);
        }

        public function update($p_courseId = false, $p_date = false, $where){
            /**
             * Assigning values...
             */
            $courseId = $p_courseId != false ? $p_courseId : $courseId;\n$date = $p_date != false ? $p_date : $date;\n

            //$this->db->insert(coursetouser, $this);

            $this->db->update(coursetouser, $this, $where);
        }

    }
?>
                
                
                