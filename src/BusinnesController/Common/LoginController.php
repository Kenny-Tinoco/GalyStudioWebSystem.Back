<?php

namespace App\BusinnesController\Common;

use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Output\UserOutputDto;
use App\Exception\BadRequestHttpException;

class LoginController
{
    private \App\Common\SessionEntity $sessionEntity;
    private UserRepository $userEntities;
    
    public function __construct(UserRepository $userEntities, SessionEntity $sessionEntity)
    {
        $this->userEntities = $userEntities;
        $this->sessionEntity = $sessionEntity;
    }

	public function login(string $userName) : UserOutputDto
    {
        $user = $this->userEntities->findByUsername($userName);
        
        $this->sessionEntity->setUser($user);
        
        return UserOutputDto::create($user);
	}
 
	public function createAccount(UserInputDto $userDto) : bool
	{
        return true;
	}
 }
