<?php
//require('app/controller/mvc.generic_controller.php');
require('app/model/follow.php');

class follow_controller extends generic_controller
{
    function save_follow($follower,$followed)
    {              
         $follow=new Follow(array('follower_user_id'=>$follower,'followed_user_id'=>$followed));
         $follow->save();
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
    }   
    function delete_follow($follower,$followed)
    {              
         $follow= Follow::find_by_follower_user_id_and_followed_user_id($follower,$followed);
         $follow->delete();
        header('Location: ' . $_SERVER['HTTP_REFERER']);  
    }   
}
?>
