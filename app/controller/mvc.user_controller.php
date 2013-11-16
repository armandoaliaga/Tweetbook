<?php
require_once 'app/model/php-activerecord/ActiveRecord.php';
require('config/database.php');
require('app/model/user.class.php');

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('app/model');
    $cfg->set_connections(array('development' => 'mysql://'.$GLOBALS['db_user'].':'.$GLOBALS['db_password'].'@'.$GLOBALS['db_host'].'/'.$GLOBALS['db_name']));	
});

class user_cotroller
{
    function register()
    {        
         $pagina=$this->load_template();
         ob_start();          
          include 'app/views/default/modules/m.register.php';            
          $table = ob_get_clean();
         $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);              
         $this->view_page($pagina);
    }
    
    function login($usernameoremail,$password)
    {                
         $key_value = "KEYVALUE";         
	 $passenc= mcrypt_ecb(MCRYPT_DES, $key_value, $password, MCRYPT_ENCRYPT);          
         $usuario = User::find_all_by_username_and_password($usernameoremail,$passenc);
         if($usuario)
         {            
            session_start();
            $_SESSION["autentificado"]= "SI";
            $_SESSION["current_user"]=$usuario[0];
            $pagina=$this->load_template();
            ob_start();                                          
            include 'app/views/default/modules/m.principal.php';            
            $table = ob_get_clean();
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
            $this->view_page($pagina);   
         }  
         else
         {
            $usuario = User::find_all_by_email_and_password($usernameoremail,$passenc);
            if($usuario)
            {            
               session_start();
               $_SESSION["autentificado"]= "SI";              
               $_SESSION["current_user"]=$usuario[0];
               $pagina=$this->load_template();
               ob_start();                                          
               include 'app/views/default/modules/m.principal.php';            
               $table = ob_get_clean();
               $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);            
               $this->view_page($pagina);   
            } 
            else {              
                header("Location: index.php");
            }
         }
    }
    
    function logout()
    {
        session_start();
        session_destroy();
        /*$pagina=$this->load_template();
        ob_start();            
        include 'app/views/default/modules/m.historia.php';            
            $table = ob_get_clean();
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
            $this->view_page($pagina);*/
        header("Location: index.php");
    }
    function saveUser($datos)
    {
        $usuario=User::create($datos);
        ob_start();  
        $pagina=$this->load_template();
        //$register = $this->load_page('app/views/default/modules/m.register.php');
        include 'app/views/default/modules/m.register.php';
         $register = ob_get_clean();  
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $register , $pagina);          
        $this->view_page($pagina);                                
         /* ob_start();         
           $tsArray = User::last();
            if($tsArray!=''){//si existen registros carga el modulo en memoria y rellena con los datos             
            //carga la tabla de la seccion de VIEW
              include 'app/views/default/modules/m.show_user.php';
            $table = ob_get_clean();
            //realiza el parseado 
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);
            }
        $this->view_page($pagina);  */                      
    }
    function userprofile()
    {
           /*ob_start();         
        $pagina=$this->load_template();
           $tsArray = User::all();
            if($tsArray!=''){//si existen registros carga el modulo en memoria y rellena con los datos                         
            include 'app/views/default/modules/m.show_user.php';
            $table = ob_get_clean();
            //realiza el parseado 
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);
            }
        $this->view_page($pagina);  */    
        ob_start();         
        $pagina=$this->load_template();                               
        include 'app/views/default/modules/m.userprofile.php';
        $table = ob_get_clean();          
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
        $this->view_page($pagina);
    }
    
    function principal()
    {
         $pagina=$this->load_template();
          ob_start();          
          include 'app/views/default/modules/m.principal.php';            
          $table = ob_get_clean();
         $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);              
         $this->view_page($pagina);
    }


    private function load_page($page)
    {
     return file_get_contents($page);
    }
    private function view_page($html)
    {
     echo $html;
    }
    
    private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
    {
      return preg_replace($in, $out, $pagina);
    }
    function load_template(){
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
