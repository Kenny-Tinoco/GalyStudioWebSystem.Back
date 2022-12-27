<?php

namespace App\Entity;

class UserEntity
{

	protected $userId;

	protected $username;

	protected $password;
 

	public function getUsername()
	{
		return $this->username;
	}

	public function getPassword()
	{
        return $this->password;
	}

	public function verifyPassword($password) : bool
	{
		return $this->password == $password;
	}
    
    public function getUserId()
    {
        return $this->userId;
    }
}
