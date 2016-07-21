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
                $modelf = fopen(FCPATH."dbModels/".ucfirst($table).".php", "w") or die("Unable to open file!"); // Create model as 
                
                // output file path...
                echo FCPATH."application/models/dbModels/".ucfirst($table).".php <br>";
                
                $cols = [];
                $freeCols = []; // non-referanced editable columns array
                foreach($val as $col => $ref){ // Getting non-referenced columns of table
                    if($ref == false) {
                        $freeCols[] = $col;
                    }
                    
                    $cols[] = $col;
                }
                
                
                $colCodeDef = ""; // To define column vars
                $colCodeParam = ""; // To define as parameters
                $colCodeAssingIns = ""; // To define assinging parameters to columns for insert  
                $colCodeAssingUp = ""; // To define assinging parameters to columns for update
                $preGetFunctions = "";
                $colCodeCheckIns = "";
                
                /**
                 * Build model variables....
                 */
                new dBug($cols);
                foreach($cols as $id => $col){
                    if($col != "id"){
                        $preGetFunctions .= "
        \n
        /**
         * Get $col from id
         */
        function get".ucfirst($col)."(\$id){
        \tif(\$row = \$this->search(array('id' => \$id))){
        \t\treturn \$row[0]->".$col.";
        \t}
        \treturn false;
        }";
                    }
                    if(!in_array($col, ['id', 'createdDate', 'updatedDate'])){ // Some columns does not implemented
                        $colCodeDef .= "\t\tpublic $".$col." = 0;\n";
                        $colCodeParam .= '$p_'.$col.' = false'.($id != (count($cols) - 1)? ', ' : "");
                        
                        $colCodeCheckIns .= $col." != NULL && ";
                        
                        $colCodeAssingIns .= '"'.$col.'" => $p_'.$col.", ";
                        
                        $colCodeAssingUp .= '$this->$'.$col.' = $p_'.$col.' != false ? $p_'.$col.' : $'.$col.";\n\t\t\t";
                    }
                    else{
                        if($col != "id"){ // if its not a id column, provide to generate update, insert time
                            if ($col == "createdDate"){/*
                                $colCodeAssingIns .= "\"".$col."\" => date('d.m.Y, H:i:s'), // ".date('d.m.Y, H:i:s')."\n\t\t\t\t";
                                $colCodeAssingIns .= "\"updatedDate\" => date('d.m.Y, H:i:s'), // ".date('d.m.Y, H:i:s')."\n\t\t\t\t";
                                */
                                $colCodeDef .="\t\tpublic $".$col." = 0;\n";
                                $colCodeDef .="\t\tpublic \$updatedDate = 0;\n";
                            }
                            else{
                                $colCodeAssingUp .= "\$updatedDate = date('d.m.Y, H:i:s'), // 06.04.2016, 04:34:18\n\t\t\t\t";
                                //$colCodeDef .="\t\tpublic \$updatedDate = 0;\n";
                            }
                        }
                    }
                }
                
                $colCodeParam = substr($colCodeParam, -2) == ', ' ? substr($colCodeParam, 0, -2) : $colCodeParam;
                $colCodeAssingIns = substr($colCodeAssingIns, -2) == ', ' ? substr($colCodeAssingIns, 0, -2) : $colCodeAssingIns;
                
                $colCodeCheckIns = substr($colCodeCheckIns, -4) == ' && ' ? substr($colCodeCheckIns, 0, -4) : $colCodeCheckIns;
                
                echo $colCodeAssingIns."<br>";
                /*
                 * Our model codes
                 **/
                $script = '
<?php
    /**
     * Created automaticaly by dbModelCreator
     * Asim Dogan NAMLI
     * asim.dogan.namli@gmail.com
     * @2016
     * 
     */
    class '.$table.' extends EL_Model {

        /**
         * Columns of table '.$table.'
         */
'.$colCodeDef.'

        public function __construct(){
            // Call the CI_Model constructor
            parent::__construct();
        }
        
        // GET FUNCTIONS //
        
'.$preGetFunctions.'        
        
        // SET FUNCTIONS//
        
        
        public function newRecord('.$colCodeParam.'){
            /**
             * Assigning values...
             */
            if ('.$colCodeCheckIns.'){
	            if($this->save(array('.$colCodeAssingIns.'))){
	                /// Record is successful
	                return 1;
	            };

        	}
            else{
	            return -1; // There is a null vars
            }            
            //return false;
        }
        ';
                
                // Write and close model script
                fwrite($modelf, $script);
                fclose($modelf);
            }
        }
    }
?>