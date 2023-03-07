<?php

namespace App\Entity;

use App\Utils\UID;

class UserEntity implements UserEntityInterface
{
	private string $userId;

	private string $userName;
    
    private string $plaintextPassword;

	private string $password;
 
    public function __construct(string $userName, string $plaintextPassword)
    {
        assert(!empty($userName));
        assert(!empty($plaintextPassword));
        
        $this->userId = UID::generateId();
        $this->userName = $userName;
        $this->plaintextPassword = $plaintextPassword;
    }
    
    public function getUserName() : string
	{
		return $this->userName;
	}

	public function getPassword() : string
	{
        return $this->password;
	}
    
    public function getPlaintextPassword() : string
    {
        return $this->plaintextPassword;
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
        $this->password = "";
        $this->plaintextPassword = "";
    }
    
    public function getUserIdentifier(): string
    {
        return $this->getUserName();
    }
    
    public function getRoles(): array
    {
        return [];
    }
}
