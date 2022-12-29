<?php

namespace App\Entity;

class SessionEntity
{
	private ?UserEntity $user;
 
	public function __construct(?UserEntity $user)
    {
        $this->user = $user ? : new UserEntity();
	}

	public function getUser() : UserEntity
    {
        return $this->user;
	}

	public function setUser(UserEntity $user) : self
    {
        $this->user = $user;
        
        return $this;
	}
    
    public function isLoggedOut() : bool
    {
        return (bool)$this -> user;
    }
}
