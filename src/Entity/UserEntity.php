<?php

namespace App\Entity;

use App\Exception\IncorrectPasswordException;
use App\Utils\Contract;
use App\Utils\UID;
use App\Utils\Utils;
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
        Contract::assert(Utils::isValid($userName), $this::class, __LINE__);
        Contract::assert(Utils::isValid($password), $this::class, __LINE__);
        
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
        Contract::assert(Utils::isValid($password), $this::class, __LINE__);
        
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
    
    public function getRoles() : Collection
    {
        return $this->roles;
    }
}
