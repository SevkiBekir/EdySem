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
    function session($key, $val = NULL){
        if($val){
            get_instance()->session->set_userData($key, $val);
        }
        return get_instance()->session->userData($key);
    }

    /**
     * /assets dizinine kısa yoldan erişebilirlik
     * 
     * @param  integer [$echo = 1] url bastırılsınmı bastırılmasın mı?
     * @return string assets/ url'i
     */
    function assetsUrl($echo = 1){
        if($echo){
            echo get_instance()->config->base_url('assets', NULL).'/';
        }
        else{
            return get_instance()->config->base_url('assets', NULL).'/';
        }
    }
    
    /**
     * /baseUrl ve diğer linklere kolay yoldan erişilebilecek
     * @param string [file = ' '] içine ne yazılırsa o sayfayı base url ile birlikte döner. Default değeri ' ' dir.
     * @param  integer [$echo = 1] return base url bastırılsınmı bastırılmasın mı?
     * @return string baseUrl/' url'i
     */
    function baseUrl($echo = 1,$file = ''){
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
    function loadView($file){
        get_instance()->load->view($file);
    }
    
     /**
     * Shortens header('Location: '.get_instance()->config->base_url($file,NULL))
     */
    function headerLocation($file = NULL){
       header('Location: '.get_instance()->config->base_url($file,NULL));
    }
    /**
     * Shortens "<meta http-equiv=\"refresh\" content=\"0; url=".get_instance()->config->base_url($file,NULL))."\">"
     */
     function MetaRefresh($file = NULL){
       echo "<meta http-equiv='refresh' content='0; url=".get_instance()->config->base_url($file,NULL)."'>";
    }
?>