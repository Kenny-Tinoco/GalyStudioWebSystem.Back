<?php

namespace App\Entity;

use App\Exception\IncorrectPasswordException;
use App\Utils\Contract;
use App\Utils\UID;
use App\Utils\Utils;
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
        if ($this->password != $password)
        {
            throw (new IncorrectPasswordException())->create($this->userName);
        }
        
        return true;
	}
    
    public function getUserId() : string
    {
        return $this->userId;
    }
    

    public function eraseCredentials() : void
    {
        // TODO: Implement eraseCredentials() method.
    }
    
    public function getUserIdentifier(): string
    {
        return "";
    }
    
    public function getRoles(): array
    {
        return [];
    }
}
