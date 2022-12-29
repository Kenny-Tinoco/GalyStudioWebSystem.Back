<?php

namespace App\Entity;

class UserEntity
{

	protected int $userId;

	protected string $username;

	protected string $password;
 

	public function getUsername() : string
	{
		return $this->username;
	}

	public function getPassword() : string
	{
        return $this->password;
	}

	public function verifyPassword(string $password) : bool
	{
		return $this->password == $password;
	}
    
    public function getUserId() : int
    {
        return $this->userId;
    }
}
