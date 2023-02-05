<?php

namespace App\BusinnesController\Common;

use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Input\UserLoginDto;
use App\Dto\Output\UserOutputDto;
use App\Entity\UserEntity;
use App\Utils\Contract;

class LoginController
{
    private SessionEntity $sessionEntity;
    private UserRepository $userEntities;
    
    public function __construct(UserRepository $userEntities, SessionEntity $sessionEntity)
    {
        Contract::assert(isset($userEntities), $this::class, __LINE__);
        Contract::assert(isset($sessionEntity), $this::class, __LINE__);
        
        $this->userEntities = $userEntities;
        $this->sessionEntity = $sessionEntity;
    }

	public function login(UserLoginDto $userLoginDto) : UserOutputDto
    {
        Contract::assert(isset($userLoginDto), $this::class, __LINE__);
        
        $user = $this->userEntities->findByUsername($userLoginDto->userName);
        
        if($user->verifyPassword($userLoginDto->password))
        {
            $this->sessionEntity->setUser($user);
        }
        
        return new UserOutputDto($user);
	}
 
	public function createAccount(UserInputDto $userDto) : UserOutputDto
	{
        Contract::assert(isset($userDto), $this::class, __LINE__);
        
        $user = new UserEntity($userDto->userName, $userDto->password);
        
        $this->userEntities->create($user);
        
        return new UserOutputDto($user);
	}
 }
