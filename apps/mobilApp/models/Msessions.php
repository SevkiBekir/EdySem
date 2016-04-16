<?php 

    class msessions extends EL_Model{
        
        private $userId = -1;
        public $sessData = [];
        
        public $token = "";
        
        public function __construct() { 
            parent::__construct(); 
            //$this->table = get_Class($this); 
            $this->initSession();
        }
        
        /**
         * Gets session data of given token // Bu __construct içine taşınabilir...
         * @param [[Type]] $token [[Description]]
         */
        function initSession(){
            if($token = get('token')){
                if($row = $this->search(array('token' => $token))){
                
                    $this->userId = $row[0]->userId;
                    $this->sessData = json_decode($row[0]->sessData, true);
                    
                    /**
                     * Fresh token
                     */
                    $token = $this->newToken();
                    $this->save(['userId' => $this->userId, 'token' => $token]); // fresh token
                    $this->token = $token;
                    
                    return $this->sessData;
                };
            }
            return false;
        }
        
        /**
         * Gets or sets mobile session data. If session does not inited, will create new session with data(key=>val)
         * @param  [[Type]] $key           data key
         * @param  [[Type]] [$val = false] set value to key
         * @return [[Type]] value of session key
         */
        public function session($key, $val = false){
            if($this->userId != -1){
                // To reduce database usage, userId does not implemeted to sessData
                if($key == "userId"){
                    return $this->userId;
                }
                
                /**
                 * Yazmaktan aşırı keyif aldığım short condition yapısı :)
                 * Denenmedi!!!
                 */
                $donut = !$val ? (isset($this->sessData[$key]) ? $this->sessData[$key] : false) 
                                : (isset($this->sessData[$key]) ? ($this->sessData[$key] = $val ? $this->sessData[$key] : false) 
                                                          : ($this->sessData[$key] = $val ? $this->sessData[$key] : false));
                /** 
                 * ($sessData[$key] = $val ? $sessData[$key] : false), short condition yazarken, 
                 * değeri bir değişkene atıp o değişkeni döndürmek için keşfettiğim bir yöntem :) hiç bir zaman false dönmez
                 */ 
                
                /**
                 * If there are $val value, that means database should be updated
                 */
                if($val){
                    $this->save(['userId' => $userId, 'sessData' => json_encode($this->sessData)]);
                }
                
                return $donut;
            }
            return false; // by default
        }
        
        /**
         * Generates new mobile session
         * @param [[Type]] $data [[Description]]
         */
        public function newSession($userId, $data = false){
            // Check whether userId is in table or not
            $data['token'] = $this->newToken();
            
            if($row = $this->search(['userId' => $userId])){
                
                // init session...
                $userId = $row[0]->userId;
                
                /**
                 * fresh token
                 */
                $this->token = $this->newToken();
                $this->save(['userId' => $userId, 'token' => $this->token]); // fresh token
                
                
                $sessData = json_decode($row[0]->sessData, true);
                //new dBug($sessData);

                return $sessData;
            }
            else{ // otherwise open new session record in table
                $this->save(["userId" => $userId, "sessData" => json_encode($data), "token" => $this->newToken()]);
            }
            return $data;
        }
        
        /**
         * Reconstructs token of mobile session
         */
        public function newToken(){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random = '';
            for ($i = 0; $i < 32; $i++){
                $random .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            return $random;
        }
        
        /**
         * Veritabanında token verisini sessDatanın içinde değil, 
         * ayrı bir columda tuttuğumuz için için sessData'yı çekerken birleştirmek gerekiyor
         */
        public function getSessData(){
            $donut = [];
            $donut = $this->sessData;
            $donut['token'] = $this->token;
            
            return $donut;
        }
        
        public function terminate($token){
            
        }
    }

?>