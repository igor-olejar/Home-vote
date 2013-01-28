<?php

class User extends Eloquent
{
	public function posts()
	{
		return $this->has_many('Post');
	}
        
        public function user_groups()
        {
            return $this->has_one('User_group');
        }
        
        public function tokens()
        {
            return $this->has_many('Token');
        }
}
