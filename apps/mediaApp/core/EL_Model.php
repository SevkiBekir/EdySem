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
    class EL_Model extends CI_Model{
        public $table; 
        
        public function __construct() 
        { 
            parent::__construct(); 
            $this->table = get_Class($this); 
            $this->load->database(); 
        }

        public function save($data, $tablename="") { 
            if($tablename == "") { 
                $tablename = $this->table; 
            } 

            $op = 'update'; 
            $keyExists = FALSE; 
            $fields = $this->db->field_data($tablename); 

            foreach ($fields as $field){ 
                if($field->primary_key == 1) { 
                    $keyExists = TRUE;
                    if(isset($data[$field->name])) { 
                        $this->db->where($field->name, $data[$field->name]); 
                    } 
                    else {
                        $op = 'insert'; 
                    }
                }
            }

            if($keyExists && $op=='update'){ 
                $this->db->set($data); 
                $this->db->update($tablename); 

                if($this->db->affected_rows()==1){ 
                    return $this->db->affected_rows(); 
                } 
            } 

            $this->db->insert($tablename, $data); 
            return $this->db->affected_rows(); 
        } 

        function search($conditions = NULL, $tablename = "", $limit = 500, $offset = 0) {     
            if($tablename == "") { 
                $tablename = $this->table; 
            } 

            if($conditions != NULL){ 
                //new dBug($conditions);
                return $this->db->where($conditions)->get($tablename, $limit, $offset = 0)->result(); 
            }

            //$query = $this->db; 
            return false; 
        } 

        function insert($data, $tablename = ""){ 
            if($tablename == ""){ 
                $tablename = $this->table; 
            }

            $this->db->insert($tablename, $data); 
            return $this->db->affected_rows(); 
        } 

        function update($data, $conditions, $tablename=""){ 
            if($tablename==""){
                $tablename = $this->table; $this->db->where($conditions);
            }

            $this->db->update($tablename,$data); 
            return $this->db->affected_rows(); 
        } 

        function delete($conditions, $tablename = "") { 
            if($tablename == ""){ 
                $tablename = $this->table;
            }

            $this->db->where($conditions); 
            $this->db->delete($tablename); 

            return $this->db->affected_rows(); 
        }
    }
?>