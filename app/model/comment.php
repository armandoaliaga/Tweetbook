<?php
class Comment extends ActiveRecord\Model
{		
	static $validates_presence_of = array(
		array('content')); 
         static $belongs_to = array(
          array('post'),
             array('user')
       );         
}
?>
