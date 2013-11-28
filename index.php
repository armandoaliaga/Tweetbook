<?php
 require 'app/controller/mvc.user_controller.php';
 require 'app/controller/mvc.post_controller.php';
require 'app/controller/mvc.comment_controller.php';   
require 'app/controller/mvc.photo_controller.php';   
     //se instancia al controlador 
	 //comentario de prueba
// $mvc = new mvc_controller();
 //pruebacomentario
 $mvc_user=new user_cotroller();
 $mvc_post=new post_controller();
 $mvc_comment=new comment_controller();
 $mvc_photo=new photo_controller();
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
    if(isset($_GET['tab']))
    {
        if($_GET['tab']=='wall')
        {
            $mvc_user->userprofile();
        }
        else if($_GET['tab']=='info')
        {
            $mvc_user->user_info();
        }
        else if($_GET['tab']=='photo')
        {
            $mvc_photo->user_photos();
        }
    }
    else
    {
        $mvc_user->userprofile();
    } 
 }
 else if( isset($_GET['action']) && $_GET['action'] == 'principal' ) 
 {
   $mvc_user->principal();
 }
 else if( isset($_POST['content']))
 {
     $mvc_post->save_post($_POST['content']);
 }
 else if( isset($_POST['contentcomment']))
 {
     $mvc_comment->save_comment($_POST['contentcomment'],$_POST['postid']);     
 }
 else if( isset($_POST['username']) && isset($_POST['password']) )
 {
        $mvc_user->saveUser(array('name'=>$_POST['name'],'last_name'=>$_POST['last_name'], 'username'=> $_POST['username'],'password'=>  $_POST["password"],'email'=>$_POST['email'], 'gender'=>$_POST['gender'],'city'=>$_POST['city'],'relationship_status'=>$_POST['relationship'],'birthday'=>$_POST['birthday'],'status'=>'f'),$_POST['passwordconfirmation']);     
 }
 else if( isset($_POST['postinfo']) && $_POST['postinfo'] == 'createalbum') 
 {
        $mvc_photo->create_album($_POST);     
 }
 else if( isset($_POST['new_name']) && isset($_POST['new_last_name']) )
 {
        $mvc_user->editUser(array('name'=>$_POST['new_name'],'last_name'=>$_POST['new_last_name'],'gender'=>$_POST['new_gender'],'city'=>$_POST['new_city'],'relationship_status'=>$_POST['new_relationship'],'birthday'=>$_POST['new_birthday']));     
 }
 else //Si no existe GET o POST -> muestra la pagina principal
 {     
    $mvc_user->register();  
 }
?>