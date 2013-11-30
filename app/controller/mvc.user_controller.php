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
            
            if($_SESSION["current_user"]->username!="admin")
            {
                $status=  Post::find('all', array('order' => 'created_at desc'));$status=  Post::find_all_by_to_user_id($_SESSION["current_user"]->id);          
               $seguidores=Follow::find_all_by_followed_user_id($_SESSION["current_user"]->id);          
               foreach($seguidores as $seguidor)
               {              
                   $aux=Post::find_all_by_from_user_id($seguidor->follower_user_id);
                   $status=array_merge($status, $aux);
               }
               usort($status, function($a, $b)
                 {
                     if($a->created_at< $b->created_at){return true;}else{return false;} ;
                 });   
                 $pagina=$this->load_template();
                 ob_start();                                          
                 include 'app/views/default/modules/m.principal.php';            
                 $table = ob_get_clean();
                 $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
                 $this->view_page($pagina);   
            }
            else
            {
                $users=User::find('all');
                $pagina=$this->load_template();
                 ob_start();                                          
                 include 'app/views/default/modules/m.adminreport.php';            
                 $table = ob_get_clean();
                 $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
                 $this->view_page($pagina);   
            }
         }  
         else
         {
            $usuario = User::find_all_by_email_and_password($usernameoremail,$passenc);
            if($usuario)
            {            
               session_start();
               $_SESSION["autentificado"]= "SI";              
               $_SESSION["current_user"]=$usuario[0];
               if($_SESSION["current_user"]->username!="admin")
                {
                        $status=  Post::find_all_by_to_user_id($_SESSION["current_user"]->id);          
                   $seguidores=Follow::find_all_by_followed_user_id($_SESSION["current_user"]->id);          
                   foreach($seguidores as $seguidor)
                   {              
                       $aux=Post::find_all_by_from_user_id($seguidor->follower_user_id);
                       $status=array_merge($status, $aux);
                   }
                   usort($status, function($a, $b)
                     {
                         if($a->created_at< $b->created_at){return true;}else{return false;} ;
                     });   
                        $pagina=$this->load_template();
                        ob_start();                                          
                        include 'app/views/default/modules/m.principal.php';            
                        $table = ob_get_clean();
                        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);            
                        $this->view_page($pagina);  
                }
                else
                {
                    $pagina=$this->load_template();
                     ob_start();                                          
                     include 'app/views/default/modules/m.adminreport.php';            
                     $table = ob_get_clean();
                     $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
                     $this->view_page($pagina);   
                }
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
        session_start();
        if($_SESSION["current_user"]->username!="admin")
        {
            ob_start();         
            $pagina=$this->load_template();
            $user= User::find_by_username($_GET['user']);
            $status=  Post::find_all_by_to_user_id($user->id, array('order' => 'created_at desc'));
            include 'app/views/default/modules/m.userprofile.php';
            $table = ob_get_clean();          
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
            $this->view_page($pagina);
        }
        else 
        {
            $users=User::find('all');
           $pagina=$this->load_template();
            ob_start();                                          
            include 'app/views/default/modules/m.adminreport.php';            
            $table = ob_get_clean();
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
            $this->view_page($pagina);   
        }
    }
    
    function principal()
    {
        session_start();
        if($_SESSION["current_user"]->username!="admin")
        {
            $pagina=$this->load_template();
             ob_start(); 

             $status=  Post::find_all_by_to_user_id($_SESSION["current_user"]->id);          
             $seguidores=Follow::find_all_by_followed_user_id($_SESSION["current_user"]->id);          
             foreach($seguidores as $seguidor)
             {              
                 $aux=Post::find_all_by_from_user_id($seguidor->follower_user_id);
                 $status= array_merge($status, $aux);
             }
             usort($status, function($a, $b)
               {
                   if($a->created_at< $b->created_at){return true;}else{return false;} ;
               });
               $status=array_unique($status);
              #$status=  Post::find('all', array('order' => 'created_at desc'));        
             include 'app/views/default/modules/m.principal.php';                               
             $table = ob_get_clean();
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);              
            $this->view_page($pagina);   
        }
        else
        {
             $users=User::find('all');
            $pagina=$this->load_template();
             ob_start();                                          
             include 'app/views/default/modules/m.adminreport.php';            
             $table = ob_get_clean();
             $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
             $this->view_page($pagina);   
        }
    }
    
    function user_info()
    { 
        ob_start();         
        $pagina=$this->load_template();        
        $user= User::find_by_username($_GET['user']);
        include 'app/views/default/modules/m.info.php';
        $table = ob_get_clean();          
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
        $this->view_page($pagina);
    }
    
    function editUser($datos)
    {
        session_start();
        $user = User::find($_SESSION["current_user"]->id);
        $user->name=$datos['name'];
        $user->last_name=$datos['last_name'];
        $user->gender=$datos['gender'];
        $user->city=$datos['city'];
        $user->relationship_status=$datos['relationship_status'];
        $user->birthday=$datos['birthday'];
        $user->save();
         $_SESSION['success']="La contraseña fue cambiada con exito!";
        $_SESSION["current_user"]=$user;
        ob_start();  
        $pagina=$this->load_template();       
        include 'app/views/default/modules/m.info.php';
        $register = ob_get_clean();  
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $register , $pagina);          
        $this->view_page($pagina);  
    }
    
    function search_friends($search_param)
    {
        session_start();
        if($_SESSION["current_user"]->username!="admin")
        {
        //quitar espacios blancos extra
            $search_param=preg_replace('/( )+/', ' ', $search_param);
            $search_param=preg_replace('/(\s)+/', ' ', $search_param);
            $search_params_array=explode(" ",$search_param);
            $friends_result;
            ob_start();         
            $pagina=$this->load_template();
            if(sizeof($search_params_array)==1)
            {
                $username_coincidences= User::find('all', array('conditions' => "username LIKE '%$search_param%'"));
                $email_coincidences= User::find('all', array('conditions' => "email LIKE '%$search_param%'"));
                $first_name_coincidences= User::find('all', array('conditions' => "name LIKE '%$search_param%'"));
                $last_name_coincidences= User::find('all', array('conditions' => "last_name LIKE '%$search_param%'")); 
                $friends_result = array_unique( array_merge($username_coincidences,array_merge( $email_coincidences,  array_merge($first_name_coincidences , $last_name_coincidences) )));
            }
            else 
            {
                $name=$search_params_array[0];
                unset($search_params_array[0]);
                $last_name= implode(" ",$search_params_array);
                $first_and_last_name_coincidences= User::find('all', array('conditions' => "name LIKE '%".$name."%' AND last_name LIKE'%".$last_name."%'"));
                $first_name_coincidences= User::find('all', array('conditions' => "name LIKE '%".$name."%'"));
                $last_name_coincidences= User::find('all', array('conditions' => "last_name LIKE '%$last_name%'")); 
                $friends_result = array_unique( array_merge($first_and_last_name_coincidences,array_merge( $first_name_coincidences , $last_name_coincidences )));
            }
            include 'app/views/default/modules/m.search_results.php';
            $table = ob_get_clean();          
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);           
            $this->view_page($pagina);
        }
        else
        {
            $users=User::find('all');
           $pagina=$this->load_template();
            ob_start();                                          
            include 'app/views/default/modules/m.adminreport.php';            
            $table = ob_get_clean();
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);                
            $this->view_page($pagina);   
        }

    }
    
    function change_password($current_pass,$new_pass,$pass_confirm)
    {
        session_start();
        $user= User::find_by_id($_SESSION["current_user"]->id);
        $key_value = "KEYVALUE";         
	$passenc= mcrypt_ecb(MCRYPT_DES, $key_value, $current_pass, MCRYPT_ENCRYPT);    
        if($user->password == $passenc)
        {
            if($new_pass==$pass_confirm)
            {
                $new= mcrypt_ecb(MCRYPT_DES, $key_value, $new_pass, MCRYPT_ENCRYPT);    
                $user->password=$new;
                $user->save();
                $_SESSION['success']="La contraseña fue cambiada con exito!";
            }
            else
            {
                $_SESSION['error_passwords']="Las contraseñas no coinciden!";
            }
        }
        else
        {
            $_SESSION['error_passwords']="La contraseña actual no es correcta!";
        }     
        ob_start();  
        $pagina=$this->load_template();       
        include 'app/views/default/modules/m.info.php';
        $register = ob_get_clean();  
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $register , $pagina);          
        $this->view_page($pagina);     
    }
    
}

?>
