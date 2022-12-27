<?php

namespace App\Entity;

class SessionEntity
{
	private $user;

	public function __construct()
	{
		$this->user = new UserEntity();
	}

	public function getUser() : UserEntity
    {
        return $this->user;
	}

	public function setUser(UserEntity $user)
    {
        $this->user = $user;
	}
    
    public function isLoggedOut() : bool
    {
        return is_null($this->user);
    }
}
