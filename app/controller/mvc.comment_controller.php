<?php
    require('app/model/comment.php');
   class comment_controller extends generic_controller
    {       
       function save_comment($content_comment,$post_id)
       {
           session_start();
          $comment=new Comment(array('content'=>$content_comment,'post_id'=>$post_id,'user_id'=>$_SESSION["current_user"]->id));         
         $comment->save();
         header("Location: index.php?action=principal");      
       }
       
       function deletecomment($id)
       {
           $comment=Comment::find($id);
           $comment->delete();
           header("Location: index.php?action=principal"); 
       }
    }
?>
