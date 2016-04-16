
<?php
   /**
     * SemTech Co -> E-Learning Project
     * @2016
     * ************ T E A M ************
     * Şevki KOCADAĞ -> bekirsevki@gmail.com
     * Asim Dogan NAMLI -> asim.dogan.namli@gmail.com
     * Okan KAYA -> okankaya93@gmail.com
     * 
     *
     * COURSES MODEL
     */	 

    class courses extends EL_Model {
        
        /**
         * Columns of table users
         */
		public $name;
		public $instructorId;
		public $catagoryId;
		public $price;
		public $createdDate;
		public $updatedDate;
		public $isActive;

        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
		/**
         * Get CourseDetails Table Inner Join
         */
        
        public function getCourseDetails($id,$where = NULL){
            $table=$this->table;
	        $this->db->select('*')
	        		 ->from($this->table.' c')
					 ->join('courseDetails cd','cd.courseId=c.id');
            
	        if($where != NULL)
	        	$this->db->where($where);
	        
            $query=$this->db->get();
	        
	        
	        foreach ($query->result() as $row){
			    new dBug($row);    
			}
        } 
        
    }
?>
                
                
                