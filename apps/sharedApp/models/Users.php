
<?php
   /**
     * SemTech Co -> E-Learning Project
     * @2016
     * ************ T E A M ************
     * Şevki KOCADAĞ -> bekirsevki@gmail.com
     * Asim Dogan NAMLI -> asim.dogan.namli@gmail.com
     * Okan KAYA -> okankaya93@gmail.com
     * 
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
		/**
         * Get UserID
         */
        function getUserId($email, $password){
        	$password = md5($password);
            //echo $password;
            if($row = $this->search(array('email' => $email, 'password' => $password))){
                
                //new dBug($row);
                
                return $row[0]->id;
            };
            
            return false;
        }
        /**
         * Get FirstName by using ID
         */
        function getFName($id){
	        if($row = $this->search(array('id' => $id))){
		        return $row[0]->firstname;
	        }
	        return false;
        }
        /**
         * Get LastName by using ID
         */
        function getLName($id){
	        if($row = $this->search(array('id' => $id))){
		        return $row[0]->lastname;
	        }
	        return false;
        }
         /**
         * Register
         */
        function register($email, $password, $firstName, $lastName){
        	//DAHA SONRA FORM VALIDATION OLACAK!
        	if ($email != NULL && $password != NULL && $firstName != NULL && $lastName != NULL){
	        	if($this->search(array('email'=>$email))){
                    //Email found!
                    //No register
                    return 0;
	            }
	            echo $email;
	            
                $password = md5($password);
                
	            if($this->save(array("email" => $email, "password" => $password, "firstname" => $firstName, "lastname" => $lastName))){
	                
	                /// Registration is successful
	                echo "Registration is successful";
	                return 1;
	            };

        	}
            else{
	            return -1; // DEĞERLER BOŞ
            }            
            //return false;
        }
		
		
		
    }
?>
                
                
                