<?php
    /**
     * With use of dbRefArray model, script creates models for each table
     */
    class createModels extends CI_Model {
        /**
         * Lets create models!!!
         */
        function __construct(){
            
            // Load dbRefArray model
            $this->load->model('dbModelCreator/dbRefArray');
            
            // Build database table-column-referance relatinship in one array
            $diagram = $this->dbRefArray->buildRefArray();
            
            
            /**
             * Proccess builded database diagram and generate standart models for all tables
             */
            foreach($diagram as $table => $val){
                // Create model script file
                $modelf = fopen(FCPATH."application/models/".$table.".php", "w") or die("Unable to open file!"); // Create model as 
                
                // output file path...
                echo FCPATH."application/models/".$table.".php <br>";
                
                $freeCols = []; // non-referanced editable columns array
                foreach($val as $col => $ref){ // Getting non-referenced columns of table
                    if($ref == false) {
                        $freeCols[] = $col;
                    }
                }
                
                
                $colCodeDef = ""; // To define column vars
                $colCodeParam = ""; // To define as parameters
                $colCodeAssingIns = ""; // To define assinging parameters to columns for insert  
                $colCodeAssingUp = ""; // To define assinging parameters to columns for update
                
                /**
                 * Build model variables....
                 */
                foreach($freeCols as $id => $col){
                    if(!in_array($col, ['id', 'createdDate', 'updatedDate'])){ // Some columns does not implemented
                        $colCodeDef .= "\t\tpublic $".$col.";\n";
                        $colCodeParam .= '$p_'.$col.' = false'.($id != (count($freeCols) - 1)? ", " : "");
                        
                        $colCodeAssingIns .= '$'.$col.' = $p_'.$col."; \n\t\t\t";
                        
                        $colCodeAssingUp .= '$'.$col.' = $p_'.$col.' != false ? $p_'.$col.' : $'.$col.";\n\t\t\t";
                    }
                    else{
                        if($col != "id"){ // if its not a id column, provide to generate update, insert time
                            if ($col == "createdDate"){
                                $colCodeAssingIns .= "\$createdDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18\n\t\t\t";
                                $colCodeAssingIns .= "\$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18\n\t\t\t";
                            }
                            else{
                                $colCodeAssingUp .= "\$updatedDate = date('d.m.Y, H:i:s'); // 06.04.2016, 04:34:18\n\t\t\t";
                            }
                        }
                    }
                }
                
                /*
                 * Our model codes
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
            $this->db->insert("'.$table.'", $this);
        }

        public function update('.$colCodeParam.', $where){
            /**
             * Assigning values...
             */
            '.$colCodeAssingUp.'
            $this->db->update("'.$table.'", $this, $where);
        }
    }
?>
                
                
                ';
                
                // Write and close model script
                fwrite($modelf, $script);
                fclose($modelf);
            }
        }
    }
?>