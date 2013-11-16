<?php
 require 'app/controller/mvc.controller.php';
 require 'app/controller/mvc.user_controller.php';

     //se instancia al controlador 
	 //comentario de prueba
// $mvc = new mvc_controller();
 //pruebacomentario
 $mvc_user=new user_cotroller();
 if( isset($_POST['usernameoremail']) && isset($_POST['password']) )
 {
   $mvc_user->login($_POST['usernameoremail'],$_POST['password']);
 }
 else if( isset($_GET['action']) && $_GET['action'] == 'logout' ) 
 {
   $mvc_user->logout();  
 }
 else if( isset($_GET['action']) && $_GET['action'] == 'userprofile' ) 
 {
   $mvc_user->userprofile();
 }
 else if( isset($_GET['action']) && $_GET['action'] == 'principal' ) 
 {
   $mvc_user->principal();
 }
 else if( isset($_POST['content']))
 {
     $mvc_user->save_post($_POST['content']);
 }
 else if( isset($_POST['username']) && isset($_POST['password']) )
 {
        $mvc_user->saveUser(array('name'=>$_POST['name'],'last_name'=>$_POST['last_name'], 'username'=> $_POST['username'],'password'=>  $_POST["password"],'email'=>$_POST['email'], 'gender'=>$_POST['gender'],'city'=>$_POST['city'],'relationship_status'=>$_POST['relationship'],'birthday'=>$_POST['birthday'],'status'=>'f'),$_POST['passwordconfirmation']);     
 }
 else //Si no existe GET o POST -> muestra la pagina principal
 {     
    $mvc_user->register();  
 }
?>