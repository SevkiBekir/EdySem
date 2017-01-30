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
         * Get getUsername by using ID
         */
        function getUsername($id){
            if($row = $this->search(array('id' => $id))){
                return $row[0]->username;
            }
            return false;
        }

        /**
         * Get getUserID by using username
         */
        function getUserIdWithUsername($username){
            if($row = $this->search(array('username' => $username))){
                return $row[0]->id;
            }
            return false;
        }
         /**
         * Register
         */
        function register($email, $password, $firstName, $lastName, $username){
        	//DAHA SONRA FORM VALIDATION OLACAK!
        	if ($email != NULL && $password != NULL && $firstName != NULL && $lastName != NULL && $username != NULL){
	        	if($this->search(array('email'=>$email))){
                    //Email found!
                    //No register
                    return 0;
	            }
	            echo $email;
	            
                $password = md5($password);
                
	            if($this->save(array("email" => $email, "password" => $password, "firstname" => $firstName, "lastname" => $lastName, "username" => $username))){
	                
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

                
                
                