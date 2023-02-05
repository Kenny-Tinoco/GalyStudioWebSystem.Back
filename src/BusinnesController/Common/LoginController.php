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
        assert($userEntities !== null);
        assert($sessionEntity !== null);
        
        $this->userEntities = $userEntities;
        $this->sessionEntity = $sessionEntity;
    }

	public function login(UserLoginDto $userLoginDto) : UserOutputDto
    {
        assert($userLoginDto !== null);
        
        $user = $this->userEntities->findByUsername($userLoginDto->getUserName());
        
        $this->sessionEntity->setUser($user);
        
        return new UserOutputDto($user);
	}
 
	public function createAccount(UserInputDto $userDto) : UserOutputDto
	{
        assert($userDto !== null);
        
        $user = new UserEntity($userDto->getUserName(), $userDto->getPassword());
        
        $this->userEntities->save($user);
        
        return new UserOutputDto($user);
	}
 }
