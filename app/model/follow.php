<?php
class Follow extends ActiveRecord\Model
{			
        static $belongs_to = array(array('follower_user_id','class_name' => 'User'),array('followed_user_id', 'class_name' => 'User'));        
}
?>
