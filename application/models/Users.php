
<?php
    /**
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     */

    //include "dbModels/Users.php";

    class users extends EL_Model {

        /**
         * Columns of table users
         */
		public $firstname;
		public $lastname;
		public $email;
		public $password;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        function getUserId($email, $pass){
            if($row = $this->search(array('email' => $email, 'password' => $pass))){
                
                //new dBug($row);
                
                return $row[0]->id;
            };
            
            return false;
        }
        
        function register($email, $password, $firstName, $lastName){
            echo $firstName;
            
            if($this->save(array("email" => $email, "password" => $password, "firstName" => $firstName, "lastName" => $lastName))){
                
                /// Registration is successful
                return true;
            };
            
            return false;
        }
    }
?>
                
                
                