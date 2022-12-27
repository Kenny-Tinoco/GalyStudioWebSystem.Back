<?php

namespace App\Entity;

class SessionEntity
{
	private UserEntity $user;

	public function __construct()
	{
		$this->user = new UserEntity();
	}

	public function getUser() : UserEntity
    {
        return $this->user;
	}

	public function setUser(UserEntity $user) : void
    {
        $this->user = $user;
	}
    
    public function isLoggedOut() : bool
    {
        return empty($this->user->getUsername()) || empty($this->user->getPassword());
    }
}
