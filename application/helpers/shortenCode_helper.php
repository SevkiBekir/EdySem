<?php
    /**
    * Asim Dogan NAMLI
    * asim.dogan.namli@gmail.com
    * @2016
    * 
    * Bu scriptde ki asıl amacım, object oriented yazacağız derken uzadı uzadıya yazdığımız yapıları kısaltıp
    * proje içinde kısa fonksiyonlarla daha etkin kullanabilmek
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
?>