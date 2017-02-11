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
        /**
         * @var
         */
        public $lastname;
        /**
         * @var
         */
        public $email;
        /**
         * @var
         */
        public $password;


        /**
         * users constructor.
         */
        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        /**
         * Get UserID
         * @param $email
         * @param $password
         * @return bool
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
         * @param $id
         * @return bool
         */
        function getFName($id){
	        if($row = $this->search(array('id' => $id))){
		        return $row[0]->firstname;
	        }
	        return false;
        }

        /**
         * Get LastName by using ID
         * @param $id
         * @return bool
         */
        function getLName($id){
	        if($row = $this->search(array('id' => $id))){
		        return $row[0]->lastname;
	        }
	        return false;
        }

        /**
         * Get getUsername by using ID
         * @param $id
         * @return bool
         */
        function getUsername($id){
            if($row = $this->search(array('id' => $id))){
                return $row[0]->username;
            }
            return false;
        }

        /**
         * Get getUserID by using username
         * @param $username
         * @return bool
         */
        function getUserIdWithUsername($username){
            if($row = $this->search(array('username' => $username))){
                return $row[0]->id;
            }
            return false;
        }

        /**
         * Get getUserDetails
         * @param null $id
         * @param null $where
         * @return
         * @internal param $id ,where
         */

        function getUserDetails($id = NULL, $where = NULL){
            $table=$this->table;
            $schemeVar=printSchemeName();

            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            $this->db->select('*')
                ->from($table.' u');
            if (findLocalOrNot()==true)
                $this->db->join($schemeVar.'.userDetails ud','ud.userId=u.id');
            else
                $this->db->join('userDetails ud','ud.userId=u.id');

            if($where != NULL)
                $this->db->where($where);

            if ($id != NULL){
                $this->db->where('u.id',$id);
            }

            $query=$this->db->get();
            $row = $query->result();
            return $row[0];


        }


        /**
         * @param $id
         * @return mixed
         */
        function getUserType($id){
            $table="userTypes";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;

            $this->db->select('name')
                ->from($table)
                ->where('id',$id);

            $query=$this->db->get();

            $row=$query->result();

            return $row[0];
        }


        /**
         * @param $id
         * @return mixed
         */
        public function getEducation($id = NULL){
            $table="educationLevels";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;

            $this->db->select('name')
                ->from($table);
            if($id !== NULL)
                $this->db->where('id',$id);

            $query=$this->db->get();

            $row=$query->result();
            if($id !==NULL)
                return $row[0];
            else
                return $row;
        }


        /**
         * @param $id
         * @return mixed
         */
        public function getOccupation($id = NULL){
            $table="occupations";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;

            $this->db->select('name')
                ->from($table);
            if($id !== NULL)
                $this->db->where('id',$id);

            $query=$this->db->get();

            $row=$query->result();
            if($id !==NULL)
                return $row[0];
            else
                return $row;
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

                
                
                