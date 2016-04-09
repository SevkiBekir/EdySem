
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

        function getUserId($email, $password){
        	$password=md5($password);
            if($row = $this->search(array('email' => $email, 'password' => $password))){
                
                //new dBug($row);
                
                return $row[0]->id;
            };
            
            return false;
        }
        
        function register($email, $password, $firstName, $lastName){
            if($this->search(array('email'=>$email))){
	            //Email found!
	            //No register
	            return false;
            }
            echo $firstName;
            $password=md5($password);
            if($this->save(array("email" => $email, "password" => $password, "firstName" => $firstName, "lastName" => $lastName))){
                
                /// Registration is successful
                return true;
            };
            
            return false;
        }
    }
?>
                
                
                