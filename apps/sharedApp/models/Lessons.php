
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class lessons extends EL_Model {

        /**
         * Columns of table lessons
         */
		public $typeId = 0;
		public $chapterId = 0;
		public $name = 0;
		public $duration = 0;


        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        

        

        /**
         * Get typeId from id
         */
        function getTypeId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->typeId;
        	}
        	return false;
        }
        

        /**
         * Get chapterId from id
         */
        function getChapterId($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->chapterId;
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
        

        /**
         * Get duration from id
         */
        function getDuration($id){
        	if($row = $this->search(array('id' => $id))){
        		return $row[0]->duration;
        	}
        	return false;
        }        
        
        // SET FUNCTIONS//
        
        
        public function newRecord($p_typeId = false, $p_chapterId = false, $p_name = false, $p_duration = false){
            /**
             * Assigning values...
             */
            if (typeId != NULL && chapterId != NULL && name != NULL && duration != NULL){
	            if($this->save(array("typeId" => $p_typeId, "chapterId" => $p_chapterId, "name" => $p_name, "duration" => $p_duration))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        
		
		// GET FUNCTION //
        public function countLessons($id){
            $table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('count(*)')
	        		 ->from($table)
                     ->where('co.id',$id)
                     ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses co","co.id=ch.courseId");

	        $query=$this->db->get();
            
	        $row=$query->result();
	        
	        return $row[0];
        }
        
        public function countCompleted($userId=0, $courseId){
            $table="lessonProgress lP";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('count(*)')
	        		 ->from($table)
                     ->where('co.id',$courseId)
                     ->where('lP.lessonLegendId',3)
                     ->where('lP.userId',$userId)
                     ->join($schemeVar.".lessons l", "l.id=lP.lessonId")
                     ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses co","co.id=ch.courseId");

	        $query=$this->db->get();
         
	        $row=$query->result();
	        
	        return $row[0];
        }
		
		
		 public function getLessons($courseId){
            $table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('l.id,l.name,l.duration,dT.name as lessonTypeName, ch.name as chapterName, ch.no as chapterNo')
	        		 ->from($table)
                     ->where('co.id',$courseId)
                     ->join($schemeVar.".documentTypes dT", "l.typeId=dT.id")
                     ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses co","co.id=ch.courseId")
					 ->order_by('ch.no ASC'); /* LessonNo diye tablo eklenecek */

	        $query=$this->db->get();
         
	        $row=$query->result();
	        
	        return $row;
        }
		
		
		/* $queryProgress="select lL.name as legendName from lessonProgress lP inner join lessonLegends lL on lL.id=lP.lessonLegendId where lP.lessonId=$lessonId and lP.userId=$userId"; */
		
		public function getLegendName($userId=0, $lessonId=0){
			if ($userId==0 || $lessonId==0)
				return NULL;
			
            $table="lessonProgress lP";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('lL.name as legendName')
	        		 ->from($table)
                     ->where('lP.id',$lessonId)
                     ->where('lP.userId',$userId)
                     ->join($schemeVar.".lessonLegends lL", "lL.id=lP.lessonLegendId");

	        $query=$this->db->get();
         
	        $row=$query->result();
	        
	        return $row[0];
        }
		
		
		/* $query=SELECT SUM(l.duration::integer) FROM "eLearningProject"."lessons" "l" JOIN "eLearningProject"."chapters" "ch" ON "ch"."id"="l"."chapterId" JOIN "eLearningProject"."courses" "co" ON "co"."id"="ch"."courseId" WHERE "co"."id" = 1 
		*/
		public function sumDurations($courseId=0){
			if ($courseId==0)
				return NULL;
			
            $table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('sum(l.duration::integer) as sum')
	        		 ->from($table)
                     ->where('co.id',$courseId)
					 ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses co","co.id=ch.courseId");
            
			$query=$this->db->get();
         
	        $row=$query->result();
	        
	        return $row[0];
        }
		
		
        
    }
        
        