<?php

namespace App\Controller\Common;

use App\Dao\Repository\UserRepository;
use App\Dto\UserDto;
use App\Entity\SessionEntity;
use App\Entity\UserEntity;

class LoginController
{
    private SessionEntity $sessionEntity;
    private UserRepository $userEntities;
    
    public function __construct(UserRepository $userEntities)
    {
        $this->userEntities = $userEntities;
        $this->sessionEntity = new SessionEntity();
    }

	public function login($userName) : bool
    {
        $user = $this->userEntities->findByUsername($userName);
        
        if(is_null($user))
        {
            return false;
        }
        
        $this->sessionEntity->setUser($user);
        
        return true;
	}
 

	public function createAccount(UserDto $userDto) : bool
	{
        return true;
	}
 
	public function isLoggedOut() : bool
	{
        return true;
	}

	public function changePassword(UserEntity $user, string $newPassword) : bool
	{
        return true;
	}

}
