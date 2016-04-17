
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
        
        public function getCourseDetails($id=NULL,$where = NULL){      	
        	$table=$this->table;
            
	        $this->db->select('*')
	        		 ->from($table.' c')
					 ->join('courseDetails cd','cd.courseId=c.id');
            
	        if($where != NULL)
	        	$this->db->where($where);
	        
            $query=$this->db->get();
	        
	        $row=$query->result();
	        return $row;
        } 
        
        public function getCatagoryName($id){
	        $table="catagories";
	        $this->db->select('name')
	        		 ->from($table)
	        		 ->where('id',$id);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
        
        public function getDateDifference($id){
        
	        $table=$this->table;
	        $this->db->select('DATEDIFF(NOW(),c.updatedDate) AS days')
	        		 ->from($table.' c')
					 ->where('id',$id);
					 
	        $query=$this->db->get();
	        
	        
	        $row=$query->result();
	        return $row[0];

        }
        
        public function getCourseRating($id){
	        $table="ratings";
	        $this->db->select('stars')
	        		 ->from($table)
	        		 ->where('courseId',$id);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
        
    }
?>
                
                
                