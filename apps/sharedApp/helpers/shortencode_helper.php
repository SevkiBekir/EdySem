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
    
    /**
     * $this->session->userData($key) yapısını kısaltır.
     * 
     * @param obj $key çekmek istenilen veri
     */
    function session($key = false, $val = NULL){
        if (isset(get_instance()->session)){
            if($key){ // if $key given...
                if($val){
                    get_instance()->session->set_userData($key, $val);
                }
                return get_instance()->session->userData($key);  
            } 
            else{ // else return all userData;
                return get_instance()->session->all_userdata();
            }
        }
        elseif(isset(get_instance()->msessions)){
            return get_instance()->msessions->session($key, $val);
        }
    }

    /**
     * /assets dizinine kısa yoldan erişebilirlik
     * 
     * @param  integer [$echo = 1] url bastırılsınmı bastırılmasın mı?
     * @return string assets/ url'i
     */
    function assetsUrl($file = '', $isSecure = false, $echo = 1){
        if(!$isSecure){ // Eğer güvenlik önemli değilse...
            if($echo){
                echo baseHostUrl('assets', NULL).'/'.$file;
            }
            else{
                return baseHostUrl('assets', NULL).'/'.$file;
            }   
        }
        else{
            $sifre = urlSifrele($file, 'media', true); // Tek kullanımlık link oluşturur)
            if($echo){
                echo $sifre;
            }
            return $sifre;
        }
    }


    /**
     * Tokenize url with some meta data
     * @param string   $url                the local/global url
     * @param string   $type               which kind?, that will proccessed by mediaApp, for now $type=[assets|video|profilPhoto]
     * @param [[Type]] [$isUnique          = false] if its unique, url will be avaible for only one access by requested page
     */
    function urlSifrele($path, $type, $isUnique = false){
        get_instance()->load->library('veriSifrele');
        
        return baseHostUrl('media/s', NULL).'/'.get_instance()->verisifrele->sifrele(['path' => $path, 'type' => $type, 'ref' => ($isUnique ? "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" : false)]);
    }

    /**
     * Removes subdomain from base_url()
     * 
     * !! IMPORTANT !!
     * that will not work when there is more than one subdomain and there is a '.' in $a parameter
     */
    function baseHostUrl($a = NULL, $b = NULL){
        $arr = explode('.', get_instance()->config->base_url($a, $b));
        if (count($arr) == 3){
            return $arr[1].$arr[2];
        }
        
        return get_instance()->config->base_url($a, $b);
    }

    /**
     * /baseUrl ve diğer linklere kolay yoldan erişilebilecek
     * @param string [file = ' '] içine ne yazılırsa o sayfayı base url ile birlikte döner. Default değeri ' ' dir.
     * @param  integer [$echo = 1] return base url bastırılsınmı bastırılmasın mı?
     * @return string baseUrl/' url'i
     */
    function baseUrl($echo = 1, $file = ''){
        if($echo){
            echo get_instance()->config->base_url($file, NULL);
        }
        else{
            return get_instance()->config->base_url($file, NULL);
        }
    }

    /**
     * $this->input->get yordamını xss kontrolü açık olarak döndrür
     * 
     * @param string $key Boş bırakıldığında tüm get verisini döndürür
     */
    function get($key = NULL){
        return get_instance()->input->get($key, TRUE);
    }

    /**
     * $this->input->post yordamını xss kontrolü açık olarak döndrür
     * 
     * @param string $key Boş bırakıldığında tüm post verisini döndürür
     */
    function post($key = NULL){
    	
        return get_instance()->input->post($key, TRUE);
    }

    /**
     * $this->input->server verisini döndürür
     * 
     * @param string $key Boş bırakıldığında tüm server verisini döndürür
     */
    function server($key = NULL){
        return get_instance()->input->server($key);
    }

    /**
     * Shortens $this->load->view($file)
     */
    function loadView($file,$data=NULL){
        get_instance()->load->view($file,$data);
    }
    
     /**
     * Shortens header('Location: '.get_instance()->config->base_url($file,NULL))
     */
    function headerLocation($file = NULL){
       header('Location: '.get_instance()->config->base_url($file, NULL));
    }
    /**
     * Shortens "<meta http-equiv=\"refresh\" content=\"0; url=".get_instance()->config->base_url($file,NULL))."\">"
     */
    function MetaRefresh($file = NULL){
       echo "<meta http-equiv='refresh' content='0; url=".get_instance()->config->base_url($file, NULL)."'>";
    }

    /**
     * find local or remote host
     */
    function findLocalOrNot(){
       $localips = array(
        '127.0.0.1',
        '::1'
        );
        return in_array($_SERVER['REMOTE_ADDR'], $localips) ? true:false;
        
    }


     /**
     * for PostgreSQL, echo Scheme Name
     */
    function printSchemeName(){
        return "eLearningProject";
        
    }

    /**
     * Prepare courseNameLink catagoryNameLink
     */
    function prepareCourseNameLink($string){
		$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
		$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','-');
		$new_text = str_replace($search,$replace,$string);
        return $new_text;
        
    }





    function convert2LegendName ($name){
            if($name=="Tamamlandı")
                return "completed";
            else if($name=="Devam Ediyor")
                return "inprogress";
            else if ($name="Başlanılmadı")
                return "start";
        }
?>