<?php

namespace App\Entity;

use App\Utils\UID;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class UserEntity
{
	private string $userId;

	private string $userName;

	private string $password;
    
    private Collection $roles;
 
    public function __construct(string $userName, string $password)
    {
        $this->userId = UID::generateId();
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
    
    public function getUserId() : string
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
