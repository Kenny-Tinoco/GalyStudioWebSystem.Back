<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class UserEntity
{

	private int $userId;

	private ?string $userName;

	private ?string $password;
    
    private Collection $roles;
 
    public function __construct(string $userName = null, string $password = null)
    {
        $this->userId = 0;
        $this->userName = $userName;
        $this->password = $password;
        
        $this->roles = new ArrayCollection();
    }
    
    public function getUserName() : string
	{
		return $this->userName;
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
    
    public function getRoles() : Collection
    {
        return $this->roles;
    }
    
    public function toArray() : array
    {
        return
        [
            'userId' => $this->userId,
            'userName' => $this->userName,
            'password' => $this->password
        ];
    }
}
