
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class universities extends EL_Model {

        /**
         * Columns of table universities
         */
		public $cityId = 0;
		public $name = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get cityId from id
         */
        function getCityId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->cityId;
        	}
        	return false;
        }
        

        /**
         * Get name from id
         */
        function getName($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->name;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_cityId = false, $p_name = false){
            /**
             * Assigning values...
             */
            if (cityId != NULL && name != NULL){
	            if($this->save(array("cityId" => $p_cityId, "name" => $p_name))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        