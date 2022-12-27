<?php

namespace App\Entity;

class SessionEntity
{
	private $user;

	public function __construct()
	{
		$this->user = new UserEntity();
	}

	public function getUser()
    {
        return $this->user;
	}

	public function setUser($user)
    {
        $this->user = $user;
	}

}
