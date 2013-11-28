<?php
    require('app/model/comment.php');
   class comment_controller extends generic_controller
    {       
       function save_comment($content_comment,$post_id)
       {
          $comment=new Comment(array('content'=>$content_comment,'post_id'=>$post_id));         
         $comment->save();
         header("Location: index.php?action=principal");      
       }
    }
?>
