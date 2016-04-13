<?php
    /**
     * That model builds database array with column referance data
     * 
     * Output of that array scheme is
     *      
     *      $refArr[tableName][columnName] = ['ref_table_name' => referanceTableName, 'ref_column_name' => referanceColumnName]
     *
     */
    class dbRefArray extends CI_Model {
        public $refArr = [];
        
        public function buildRefArray(){
            /**
             * Get tables of database
             */
            $query = $this->db->query(" SELECT `TABLE_NAME`
                                        FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                                        WHERE `TABLE_SCHEMA`= DATABASE()
                                     ");
            $tablesTmp = $query->result();
            
            
            /**
             * Get each table's column and referance table name with referance column
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
            
            /**
             * Setting query array as $refArr['tableName'][columnName] = [refData]
             */
            
            // Step1: Arrange referance column usage array
            foreach($query2->result_array() as $key => $val){ 
               $refArr[$val['table_name']] = [$val['column_name'] => ['ref_table_name' => $val['referenced_table_name'], 'ref_column_name' => $val['referenced_column_name']]];
            }
            
            // Step2: Arrange $refArr
            foreach($query->result_array() as $key => $val){
                
                $refArr[$val['table_name']] = !isset($refArr[$val['table_name']]) ? [] : $refArr[$val['table_name']];
                
                $refArr[$val['table_name']][$val['column_name']] = isset($refArr[$val['table_name']]) && isset($refArr[$val['table_name']][$val['column_name']])
                                                                    ? [
                                                                        "refTable" => $refArr[$val['table_name']][$val['column_name']]['ref_table_name'], 
                                                                        "refTableCol" => $refArr[$val['table_name']][$val['column_name']]['ref_column_name']
                                                                      ]
                                                                    : false;
            }
            
            return $refArr;
        }
        
        public function writeDiagram(){
            
            new dBug($refArr);
            
        }
        
        function __construct(){
            
        }
        
    }
?>
