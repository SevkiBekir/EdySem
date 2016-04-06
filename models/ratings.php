
<?php
    class ratings extends CI_Model {

        /**
         * Columns of table ratings
         */
		public $stars;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_stars = false){
            /**
             * Assigning values...
             */
            $stars = $p_stars;\n

            $this->db->insert(ratings, $this);
        }

        public function update($p_stars = false, $where){
            /**
             * Assigning values...
             */
            $stars = $p_stars != false ? $p_stars : $stars;\n

            //$this->db->insert(ratings, $this);

            $this->db->update(ratings, $this, $where);
        }

    }
?>
                
                
                