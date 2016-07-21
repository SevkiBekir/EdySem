
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class iptables extends EL_Model {

        /**
         * Columns of table iptables
         */
		public $userId = 0;
		public $IP = 0;
		public $where = 0;
		public $date = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get userId from id
         */
        function getUserId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->userId;
        	}
        	return false;
        }
        

        /**
         * Get IP from id
         */
        function getIP($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->IP;
        	}
        	return false;
        }
        

        /**
         * Get where from id
         */
        function getWhere($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->where;
        	}
        	return false;
        }
        

        /**
         * Get date from id
         */
        function getDate($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->date;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_userId = false, $p_IP = false, $p_where = false, $p_date = false){
            /**
             * Assigning values...
             */
            if (userId != NULL && IP != NULL && where != NULL && date != NULL){
	            if($this->save(array("userId" => $p_userId, "IP" => $p_IP, "where" => $p_where, "date" => $p_date))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        