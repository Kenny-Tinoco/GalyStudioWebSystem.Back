<?php

namespace App\Entity;

use App\Utils\UID;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class UserEntity implements UserEntityInterface
{
	private string $userId;

	private string $userName;

	private string $password;
    
    private Collection $roles;
 
    public function __construct(string $userName, string $password)
    {
        assert(!empty($userName));
        assert(!empty($password));
        
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
    
    public function setPassword(string $password) : void
    {
        assert(!empty($password));
        $this -> password = $password;
    }
    
    public function getUserId() : string
    {
        return $this->userId;
    }
    
    public function eraseCredentials() : void
    {
    }
    
    public function getUserIdentifier(): string
    {
        return $this->getUserName();
    }
    
    public function getRoles(): array
    {
        return $this->roles->toArray();
    }
}
