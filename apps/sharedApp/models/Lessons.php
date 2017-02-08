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
        
		
		 public function countLessons($id){
            $table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('count(*) as count')
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
            
	        $this->db->select('count(*) as count')
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
                     ->where('lP.lessonId',$lessonId)
                     ->where('lP.userId',$userId)
                     ->join($schemeVar.".lessonLegends lL", "lL.id=lP.lessonLegendId");

	        $query=$this->db->get();
			
	        $row=$query->result();

	        if($row != NULL)
	            return $row[0];
	        else
	            return "Başlanılmadı";
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
            
	        $this->db->select('sum(l.duration) as sum')
	        		 ->from($table)
                     ->where('co.id',$courseId)
					 ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses co","co.id=ch.courseId");
            
			$query=$this->db->get();
         
	        $row=$query->result();
	        
	        return $row[0];
        }
		
		public function controlLink($link,$lessonId=0,$optionalCase=0){

			$table="links li";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
			$conditionArray=[];
			
			if ($optionalCase==0) 
				$conditionArray=array('lessonId' => $lessonId);
			else if ($optionalCase==1) 
				$conditionArray=array('lessonId' => NULL);
			
			$conditionArray['name']=$link;

			$row=$this->countRow($conditionArray,$table);

			return $row->rowCount;
			
		}
		
		
		 public function getLessonLink($id=NULL,$where=NULL){
	        $table="links";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('*')
	        		 ->from($table);
	       if ($where == NULL)
                $this -> db ->where('lessonId',$id);
            else if ($id == NULL)
                $this -> db -> where('name', $where);

	        $query=$this->db->get();
	        $row=$query->result();
	        
	        return $row[0];
        }
		
//		$query="select count(*) as OK, c.name,c.id,c.teacherId   where cTU.userId=$userId and l.id=$getLessonId";
		
		public function ControlUser2Lesson($userId=0,$lessonId){

			$table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
            
	        $this->db->select('count(*) as ok, c.name as courseName, c.id as courseId, c.instructorId')
	        		 ->from($table)
					 ->join($schemeVar.".chapters ch","ch.id=l.chapterId")
                     ->join($schemeVar.".courses c","c.id=ch.courseId")
					 ->join($schemeVar.".courseToUser cTU","c.id=cTU.courseId")
					 ->where(array('cTU.userId'=>$userId, 'l.id'=>$lessonId))
					 ->group_by(array("c.name", "c.id"));
			
			$query=$this->db->get();
	        $row=$query->result();

	        return $row[0];
		}
		
		
//		$queryLesson="select l.name, l.content, lT.name as lessonTName, l.fileURL from lessons l inner join lessonTypes lT on lT.id=l.typeId where l.id=$getLessonId";
		public function getLessonWithContent($lessonId)
		{
			$table="lessons l";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;
			
			 $this->db->select('l.name as lessonName, l.content as content, dt.name as documentTypeName, d.explanation, d.name as fileURL ')
					  ->from($table)
					  ->join($schemeVar.".documents d","d.lessonId=l.id")
					  ->join($schemeVar.".documentTypes dt","dt.id=d.documentTypeId")
				 	  ->where("l.id",$lessonId);
			
			$query=$this->db->get();
	        $row=$query->result();
			
			return $row[0];
		}
		
		
        // SET FUNCTIONS //
        
        
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
        
		public function generateLinkAndSave($lessonName=NULL,$courseId=0,$lessonId=0)
		{
			$table="links";
            $schemeVar=printSchemeName();
            if (findLocalOrNot()==true)
                $table=$schemeVar.".".$table;

			if($lessonName!=NULL && $courseId!=0 && $lessonId!=0){

				$lessonName=prepareCourseNameLink($lessonName);
				if(!($this->controlLink($lessonName,$lessonId))){
					// there is no link and save
					//case1: is there any the same link name in the table, if it's not, then save,
					//case 2: if it is, then change link name with random number and save it.
					if(!($this->controlLink($lessonName,$lessonId,1))){
						$this -> save(array('lessonId'=> $lessonId, 'name'=>$lessonName,'courseId'=>$courseId),$table);
						return $lessonName;
					}
					else{
						$randomNumber=rand(1,999999);
						$lessonName.="-".$randomNumber;
						$this -> save(array('lessonId'=> $lessonId, 'name'=>$lessonName,'courseId'=>$courseId),$table);
						return $lessonName;
					}
				}
				else //found the link
					return $lessonName;
			}
			else
				return NULL;
			
		}
	
       
		
		
		
		
        
    }
        
        