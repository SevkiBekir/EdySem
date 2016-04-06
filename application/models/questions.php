
<?php
    class questions extends CI_Model {

        /**
         * Columns of table questions
         */
		public $question;
		public $correctAnswer;
		public $duration;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert($p_question = false, $p_correctAnswer = false, $p_duration = false){
            /**
             * Assigning values...
             */
            $question = $p_question;\n$correctAnswer = $p_correctAnswer;\n$duration = $p_duration;\n

            $this->db->insert(questions, $this);
        }

        public function update($p_question = false, $p_correctAnswer = false, $p_duration = false, $where){
            /**
             * Assigning values...
             */
            $question = $p_question != false ? $p_question : $question;\n$correctAnswer = $p_correctAnswer != false ? $p_correctAnswer : $correctAnswer;\n$duration = $p_duration != false ? $p_duration : $duration;\n

            //$this->db->insert(questions, $this);

            $this->db->update(questions, $this, $where);
        }

    }
?>
                
                
                