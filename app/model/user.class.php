<?php

class User extends ActiveRecord\Model
{	

	// must have a name and a state
	static $validates_presence_of = array(
		array('name'), array('username'), array('password'), array('email'), array('gender'));
        
        static $validates_uniqueness_of = array(array('username','message'=>'El nombre de usuario ya esta siendo utilizado!'));
}

?>
