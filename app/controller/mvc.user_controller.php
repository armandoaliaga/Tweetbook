<?php
require('app/controller/mvc.generic_controller.php');
require('app/model/user.php');

class user_cotroller extends generic_controller
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
             $status=  Post::find('all', array('order' => 'created_at desc'));   
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
                $status=  Post::find('all', array('order' => 'created_at desc'));   
               $pagina=$this->load_template();
               ob_start();                                          
               include 'app/views/default/modules/m.principal.php';            
               $table = ob_get_clean();
               $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);            
               $this->view_page($pagina);   
            } 
            else {    
                session_start();
                $_SESSION["error_login"]= "El nombre de usuario o la conotraseña son incorrectos!";
                header("Location: index.php");
            }
         }
    }
    
    function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
    function saveUser($datos,$password_confirmation)
    {
        $usuario = new User($datos);
        if($datos["password"]==$password_confirmation)
        {
            $key_value ="KEYVALUE";
            $usuario->password = mcrypt_ecb(MCRYPT_DES, $key_value, $datos["password"], MCRYPT_ENCRYPT); 
            $usuario->save();
            if($usuario->is_valid())
            {
                $_SESSION['success']="tu registro fue realizado correctamente!";
            }     
        }
        else
        {
            $_SESSION['error_passwords']="Las contraseñas no coinciden!";
        }
        ob_start();  
        $pagina=$this->load_template();
        //$register = $this->load_page('app/views/default/modules/m.register.php');
        include 'app/views/default/modules/m.register.php';
         $register = ob_get_clean();  
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $register , $pagina);          
        $this->view_page($pagina);                      
    }
    function userprofile()
    { 
        ob_start();         
        $pagina=$this->load_template();
        $status=  Post::find_all_by_to_user_id($_SESSION["current_user"]->id, array('order' => 'created_at desc'));
        include 'app/views/default/modules/m.userprofile.php';
        $table = ob_get_clean();          
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
        $this->view_page($pagina);
    }
    
    function principal()
    {
         $pagina=$this->load_template();
          ob_start();         
           $status=  Post::find('all', array('order' => 'created_at desc'));        
          include 'app/views/default/modules/m.principal.php';                               
          $table = ob_get_clean();
         $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);              
         $this->view_page($pagina);       
    }
    
    function user_info()
    { 
        ob_start();         
        $pagina=$this->load_template();        
        include 'app/views/default/modules/m.info.php';
        $table = ob_get_clean();          
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
        $this->view_page($pagina);
    }
    
    function editUser($datos)
    {
        session_start();
        $usuario = User::find($_SESSION["current_user"]->id);
        $usuario->name=$datos['name'];
        $usuario->last_name=$datos['last_name'];
        $usuario->gender=$datos['gender'];
        $usuario->city=$datos['city'];
        $usuario->relationship_status=$datos['relationship_status'];
        $usuario->birthday=$datos['birthday'];
        $usuario->save();
        $_SESSION["current_user"]=$usuario;
        ob_start();  
        $pagina=$this->load_template();       
        include 'app/views/default/modules/m.info.php';
        $register = ob_get_clean();  
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $register , $pagina);          
        $this->view_page($pagina);  
    }
}

?>
