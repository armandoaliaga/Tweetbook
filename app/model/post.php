<?php
class Post extends ActiveRecord\Model
{		
	static $validates_presence_of = array(
		array('content')); 
        static $belongs_to = array(array('from_user','class_name' => 'User'),array('to_user', 'class_name' => 'User'));
        
        static $has_many = array(
        array('comments')
        );
        public function __toString() {
                return "".$this->id;
            }
}
?>
