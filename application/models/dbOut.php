<?php
    class dbOut extends CI_Model {
        
        public function writeDiagram(){
            
            $diagram = [];
            
            /**
             * Get tables of database
             */
            $query = $this->db->query(" SELECT `TABLE_NAME`
                                        FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                                        WHERE `TABLE_SCHEMA`= DATABASE()
                                     ");
            $tablesTmp = $query->result();
            
            
            /**
             * Set table names as id of $diagram array;
             * Get each table's column and referance table name with referance column
             */
            /*
            foreach($tablesTmp as $key=>$val){
                $diagram[$val] = "";
                
                $query = $this->db->query(" SELECT `COLUMN_NAME`
                                        FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                                        WHERE `TABLE_SCHEMA`= DATABASE()
                                            AND `TABLE_NAME` = '".$val."'
                                     ");
                $tablesTmp = $query->result();
            }
            */
            
            
            $query = $this->db->query(" SELECT
                                            INFORMATION_SCHEMA.COLUMNS.TABLE_NAME AS `table_name`,
                                            INFORMATION_SCHEMA.COLUMNS.COLUMN_NAME AS `column_name`
                                        FROM INFORMATION_SCHEMA.COLUMNS 
                                        WHERE INFORMATION_SCHEMA.COLUMNS.TABLE_SCHEMA = DATABASE()
                                     ");
            
            $query2 = $this->db->query(" SELECT 
                                            INFORMATION_SCHEMA.KEY_COLUMN_USAGE.TABLE_NAME AS `table_name`,
                                            INFORMATION_SCHEMA.KEY_COLUMN_USAGE.COLUMN_NAME AS `column_name`,
                                            INFORMATION_SCHEMA.KEY_COLUMN_USAGE.REFERENCED_COLUMN_NAME AS `referenced_column_name`,
                                            INFORMATION_SCHEMA.KEY_COLUMN_USAGE.REFERENCED_TABLE_NAME AS `referenced_table_name`
                                        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                                        WHERE INFORMATION_SCHEMA.KEY_COLUMN_USAGE.TABLE_SCHEMA = DATABASE()
                                            AND INFORMATION_SCHEMA.KEY_COLUMN_USAGE.REFERENCED_TABLE_SCHEMA = DATABASE()
                                    ");
            
            $refArr = [];
            
            /**
             * Setting query array as $diagram['tableName'][columnName] = [refData]
             */
            
            // Step1: Arrange referance column usage array
            foreach($query2->result_array() as $key => $val){ 
               $refArr[$val['table_name']] = [$val['column_name'] => ['ref_table_name' => $val['referenced_table_name'], 'ref_column_name' => $val['referenced_column_name']]];
            }
            
            // Step2: Arrange $diagram
            foreach($query->result_array() as $key => $val){
                
                $diagram[$val['table_name']] = !isset($diagram[$val['table_name']]) ? [] : $diagram[$val['table_name']];
                
                $diagram[$val['table_name']][$val['column_name']] = isset($refArr[$val['table_name']]) && isset($refArr[$val['table_name']][$val['column_name']])
                                                                    ? [
                                                                        "refTable" => $refArr[$val['table_name']][$val['column_name']]['ref_table_name'], 
                                                                        "refTableCol" => $refArr[$val['table_name']][$val['column_name']]['ref_column_name']
                                                                      ]
                                                                    : false;
            }
            
            //new dBug($diagram);
            
            /**
             * Lets create models!!!
             */
            
            foreach($diagram as $table => $val){
                $modelf = fopen(FCPATH."application/models/".$table.".php", "w") or die("Unable to open file!"); // Create model as 
                new dBug(FCPATH."application/models/".$table.".php");
                
                $freeCols = [];
                foreach($val as $col => $ref){ // Getting non-referenced columns of table
                    if($ref == false) {
                        $freeCols[] = $col;
                    }
                }
                
                
                $colCodeDef = ""; // To define column vars
                $colCodeParam = ""; // To define as parameters
                $colCodeAssingIns = ""; // To define assinging parameters to columns for insert  
                $colCodeAssingUp = ""; // To define assinging parameters to columns for update
                foreach($freeCols as $id => $col){
                    if(!in_array($col, ['id', 'createdDate', 'updatedDate'])){ // Some columns does not implemented
                        $colCodeDef .= "\t\tpublic $".$col.";\n";
                        $colCodeParam .= '$p_'.$col.' = false'.($id != (count($freeCols) - 1)? ", " : "");
                        $colCodeAssingIns .= '$'.$col.' = $p_'.$col.';\n';
                        
                        $colCodeAssingUp .= '$'.$col.' = $p_'.$col.' != false ? $p_'.$col.' : $'.$col.';\n';
                    }
                    else{
                        if($col != "id"){ // if its not a id column, provide to generate update, insert time
                            if ($col == "createdDate"){
                                $colCodeAssingIns .= '$createdDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n
                                                      $updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n';
                            }
                            else{
                                $colCodeAssingUp .= '$updatedDate = date("d.m.Y, H:i:s"); // 06.04.2016, 04:34:18\n';
                            }
                        }
                    }
                }
                
                /*
                 * Our script codes
                 **/
                $script = '
<?php
    class '.$table.' extends CI_Model {

        /**
         * Columns of table '.$table.'
         */
'.$colCodeDef.'

        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }

        public function insert('.$colCodeParam.'){
            /**
             * Assigning values...
             */
            '.$colCodeAssingIns.'

            $this->db->insert('.$table.', $this);
        }

        public function update('.$colCodeParam.', $where){
            /**
             * Assigning values...
             */
            '.$colCodeAssingUp.'

            //$this->db->insert('.$table.', $this);

            $this->db->update('.$table.', $this, $where);
        }

    }
?>
                
                
                ';
                
                //echo $script;
                
                fwrite($modelf, $script);
                fclose($modelf);
            }
            
            
            /*
            foreach ($query->result() as $row){
               echo $row->title;
               echo $row->name;
               echo $row->body;
            }
            */
        }
        
        function __construct(){
            //new dBug('Asım');
        }
        
    }
?>
