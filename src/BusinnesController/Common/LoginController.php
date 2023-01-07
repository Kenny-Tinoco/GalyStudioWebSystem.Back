<?php

namespace App\BusinnesController\Common;

use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Input\UserLoginDto;
use App\Dto\Output\UserOutputDto;
use App\Entity\UserEntity;

class LoginController
{
    private SessionEntity $sessionEntity;
    private UserRepository $userEntities;
    
    public function __construct(UserRepository $userEntities, SessionEntity $sessionEntity)
    {
        $this->userEntities = $userEntities;
        $this->sessionEntity = $sessionEntity;
    }

	public function login(UserLoginDto $userLoginDto) : UserOutputDto
    {
        $user = $this->userEntities->findByUsername($userLoginDto->userName);
        
        if($user->verifyPassword($userLoginDto->password))
        {
            $this->sessionEntity->setUser($user);
        }
        
        return new UserOutputDto($user);
	}
 
	public function createAccount(UserInputDto $userDto) : UserOutputDto
	{
        $user = new UserEntity($userDto->userName, $userDto->password);
        
        $this->userEntities->create($user);
        
        return new UserOutputDto($user);
	}
 }
