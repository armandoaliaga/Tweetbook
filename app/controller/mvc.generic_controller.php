<?php
require_once 'app/model/php-activerecord/ActiveRecord.php';
require('config/database.php');
//configuracion que debe llamarse para utilizar los controladores
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('app/model');
    $cfg->set_connections(array('development' => 'mysql://'.$GLOBALS['db_user'].':'.$GLOBALS['db_password'].'@'.$GLOBALS['db_host'].'/'.$GLOBALS['db_name']));	
});
//de esta clase deberian heredar todos los demas controladores
class generic_controller {

   
    public function load_page($page)
    {
     return file_get_contents($page);
    }
    public function view_page($html)
    {
     echo $html;
    }
    
    public function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
    {
      return preg_replace($in, $out, $pagina);
    }
    public function load_template(){
    ob_start();
    $pagina = $this->load_page('app/views/default/page.php');
    //$header = $this->load_page('app/views/default/sections/s.header.php');
    include 'app/views/default/sections/s.header.php';
    $header = ob_get_clean();
    $pagina = $this->replace_content('/\#HEADER\#/ms' ,$header , $pagina);    
    //$menu_left = $this->load_page('app/views/default/sections/s.menuizquierda.php');
    include 'app/views/default/sections/s.menuizquierda.php';
    $menu_left= ob_get_clean();
    $pagina = $this->replace_content('/\#MENULEFT\#/ms' ,$menu_left , $pagina);
    return $pagina;
    }
}
?>
