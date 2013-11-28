<?php
class Album extends ActiveRecord\Model
{		
	static $validates_presence_of = array(
		array('name')); 
        static $belongs_to = array(array('user'));
        static $has_many = array(array('photos'));
}
?>