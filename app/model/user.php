<?php

class User extends ActiveRecord\Model
{	
        static $has_many = array(
      array('posts'),
      array('albums'),
            array('comments')
      );
	static $validates_presence_of = array(
		array('name'), array('username'), array('password'), array('email'), array('gender'));
        
        static $validates_uniqueness_of = array(array('username','message'=>'El nombre de usuario ya esta siendo utilizado!'));
         static $validates_format_of = array(array('email', 'message' =>'El email es invalido!', 'with' =>'/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/'));
}

?>
