<?php
 require 'app/controller/mvc.user_controller.php';
 require 'app/controller/mvc.post_controller.php';
require 'app/controller/mvc.comment_controller.php';   
require 'app/controller/mvc.photo_controller.php'; 
require 'app/controller/mvc.follow_controller.php'; 
     //se instancia al controlador 
	 //comentario de prueba
// $mvc = new mvc_controller();
 //pruebacomentario
 $mvc_user=new user_cotroller();
 $mvc_post=new post_controller();
 $mvc_comment=new comment_controller();
 $mvc_photo=new photo_controller();
 $mvc_follow=new follow_controller();
 if( isset($_POST['usernameoremail']) && isset($_POST['password']) )
 {
   $mvc_user->login($_POST['usernameoremail'],$_POST['password']);
 }
 else if( isset($_GET['action']) && $_GET['action'] == 'logout' ) 
 {
   $mvc_user->logout();  
 }
 else if( isset($_GET['action']) && isset($_GET['user']) && $_GET['action'] == 'userprofile' ) 
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
            if(isset($_GET['album']))
            {
                $mvc_photo->user_photos_of_album($_GET['album']);
            }
            else
            {
                $mvc_photo->user_photos();
            }
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
 else if( isset($_GET['action']) && isset($_GET['commentid']) && $_GET['action'] == 'deletecomment') 
 {
    $mvc_comment->deletecomment($_GET['commentid']);
 }
 else if( isset($_GET['action']) && isset($_GET['postid']) && $_GET['action'] == 'deletepost') 
 {
    $mvc_post->deletepost($_GET['postid']);
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
 else if( isset($_POST['postinfo']) && $_POST['postinfo'] == 'uploadphotos') 
 {
        $mvc_photo->upload_photos_to_album($_POST['album_id'],$_FILES);     
 }
 else if( isset($_POST['postinfo']) && $_POST['postinfo'] == 'deletephoto') 
 {
        $mvc_photo->delete_photo($_POST['photo_id'],$_POST['album_id']);     
 }
 else if( isset($_POST['follower_id']) && isset($_POST['followed_id'])) 
 {
        $mvc_follow->save_follow($_POST['follower_id'],$_POST['followed_id']);     
 }
  else if( isset($_POST['no_follower_id']) && isset($_POST['no_followed_id'])) 
 {
        $mvc_follow->delete_follow($_POST['no_follower_id'],$_POST['no_followed_id']);     
 }
 else if( isset($_POST['new_name']) && isset($_POST['new_last_name']) )
 {
         $mvc_user->editUser(array('name'=>$_POST['new_name'],'last_name'=>$_POST['new_last_name'],'gender'=>$_POST['new_gender'],'city'=>$_POST['new_city'],'relationship_status'=>$_POST['new_relationship'],'birthday'=>$_POST['new_birthday']));     
 }
 else if( isset($_POST['postinfo']) && $_POST['postinfo'] == 'search') 
 {
    $mvc_user->search_friends($_POST['search_param']);
 }
 else if( isset($_POST['current_password']) &&  isset($_POST['new_password']) &&  isset($_POST['password_confirmation'])) 
 {
    $mvc_user->change_password($_POST['current_password'],$_POST['new_password'],$_POST['password_confirmation']);
 }
 else //Si no existe GET o POST -> muestra la pagina principal
 {     
    $mvc_user->register();  
 }
?>