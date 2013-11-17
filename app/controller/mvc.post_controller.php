<?php
//require('app/controller/mvc.generic_controller.php');
require('app/model/post.php');

class post_controller extends generic_controller
{
    function save_post($content)
    {      
        session_start();
        $id=$_SESSION["current_user"]->id;
         $post=new Post(array('content'=>$content,'from_user_id'=>$id,'to_user_id'=>$id));
         $post->save();
         header("Location: index.php?action=principal");      
    }
}
?>
