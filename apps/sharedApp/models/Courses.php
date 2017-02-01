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
defined('BASEPATH') OR exit('No direct script access allowed');
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

    public function getCourseDetails($id=NULL,$where = NULL,$catId = NULL,$like = NULL){
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

        if ($id != NULL){
            $this->db->where('id',$id);
        }

        if ($catId != NULL){
            $this->db->where('catagoryId',$catId);
        }

        if ($like != NULL){
            $this->db->like('name',$like);
        }

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




     public function getCatagory($id = NULL){
        $table="catagories";
        $schemeVar=printSchemeName();
        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;

        $this->db->select('*')
                 ->from($table);

         if ($id != NULL){
             $this->db->where('id',$id);
         }


        $query=$this->db->get();
        $row=$query->result();

        return $row;
    }

    public function getCatagoryWithWords($words = NULL){
        $table=$this->table;
        $schemeVar=printSchemeName();

        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;
        $this->db->select('catagoryId, ca.name')
            ->from($table.' c');

        $this->db->join('courseDetails cd','cd.courseId=c.id');
        $this->db->join('catagories ca','ca.Id=c.catagoryId');
        $this->db->distinct();

        if ($words != NULL){
            $this->db->like('c.name',$words);
        }


        $query=$this->db->get();
        $row=$query->result();

        return $row;
    }


    public function getDateDifference($id){

        $table=$this->table;
        $schemeVar=printSchemeName();
        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;

        $this->db->select("DATEDIFF(NOW(),c.updatedDate) AS days")
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



    public function getCatagoryCount($id=NULL,$words = NULL){
        $table="courses";
        $schemeVar=printSchemeName();
        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;

        $this->db->select('count(*) as count')
                 ->from($table);


        if($id != NULL)
            $this->db->like('catagoryId',$id);

        if($words != NULL)
            $this->db->like('name',$words);
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

    public function getCatagoryIdFromLink($string){
        $table="links";
        $schemeVar=printSchemeName();
        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;
        $this->db->select('catagoryId')
            ->from($table)
            ->where('name',$string);

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

    /* $queryPay="select count(*) as OK from courseToUser where userId=$userId and courseId=$getCourseId";
    */

    public function controlCourse2User($userId, $courseId){

        $table="courseToUser";
        $schemeVar=printSchemeName();
        if (findLocalOrNot()==true)
            $table=$schemeVar.".".$table;

        $this->db->select('count(*) as count')
                 ->from($table)
                 ->where('userId',$userId)
                 ->where('courseId',$courseId);

        $query=$this->db->get();

        $row=$query->result();

        return $row[0];
    }


}

                
                