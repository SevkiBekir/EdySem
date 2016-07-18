<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Loading defauld sharedApp config
 * 
 * Appler tarafından yaygın olarak kullanılan configrasyonlar aşağıda include ediliyor, eğer bu App'e yönelik
 * özel ayar söz konusu olursa, aşağıya yazılabilir
 */
include SHAREDAPP.'/config/'.end((explode(DIRECTORY_SEPARATOR, __FILE__)));