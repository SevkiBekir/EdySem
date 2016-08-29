
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
            $schemeVar=printSchemeName();
            
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
	        $this->db->select('*')
	        		 ->from($table.' c');
            if (findLocalOrNot()==true)
                $this->db->join($schemeVar.'.courseDetails cd','cd.courseId=c.id');   
            else
                $this->db->join('courseDetails cd','cd.courseId=c.id');
            
	        if($where != NULL)
	        	$this->db->where($where);
	        
            $query=$this->db->get();
	      
	        $row = $query->result();
            if (count($where)==2) //to get course
                return $row[0];
            else
                return $row;
        } 
        
        public function getCatagoryName($id){
	        $table="catagories";
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
        
         public function getCatagory(){
	        $table="catagories";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
             
	        $this->db->select('*')
	        		 ->from($table);
	        		 

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row;
        }
        
        
        public function getDateDifference($id){
        
	        $table=$this->table;
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select("DATE_PART('day',NOW()-c.\"updatedDate\") AS days")
	        		 ->from($table.' c')
					 ->where('id',$id);
					 
	        $query=$this->db->get();
	        
	        
	        $row=$query->result();
	        return $row[0];

        }
        
        public function getCourseRating($id){
	        $table="ratings";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('stars')
	        		 ->from($table)
	        		 ->where('courseId',$id);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
        
       
           
        public function getCatagoryCount($id){
	        $table="courses";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('count(*)')
	        		 ->from($table)
	        		 ->where('catagoryId',$id);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
        
         public function getCourseLink($id=NULL,$where=NULL){
	        $table="links";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('*')
	        		 ->from($table);
	       if ($where == NULL)
                $this -> db ->where('courseId',$id);
            else if ($id == NULL)
                $this -> db -> where('name', $where);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
        
        public function getInstructor($id){
            $table="users u";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('*')
	        		 ->from($table)
                     ->where('u.id',$id)
                     ->join($schemeVar.'.userDetails ud','ud.userId=u.id');

	        $query=$this->db->get();
           
	        $row=$query->result();
	        
	        return $row[0];
        }
        
        public function getEducation($id){
            $table="educationLevels";
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
        
        
        public function getOccupation($id){
            $table="occupations";
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
        
    }
?>
                
                
                