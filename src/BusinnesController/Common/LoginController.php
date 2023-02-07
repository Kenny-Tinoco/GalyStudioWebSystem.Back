<?php

namespace App\BusinnesController\Common;

use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Input\UserLoginDto;
use App\Dto\Output\UserOutputDto;
use App\Entity\UserEntity;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController
{
    private SessionEntity $sessionEntity;
    private UserRepository $userEntities;
    private UserPasswordHasherInterface $userPasswordHasher;
    
    public function __construct(UserRepository $userEntities, SessionEntity $sessionEntity, UserPasswordHasherInterface $userPasswordHasher)
    {
        assert($userEntities !== null);
        assert($sessionEntity !== null);
        assert($userPasswordHasher !== null);
        
        $this->userEntities = $userEntities;
        $this->sessionEntity = $sessionEntity;
        $this->userPasswordHasher = $userPasswordHasher;
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
        
        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $user->getPlaintextPassword());
        $user->setPassword($hashedPassword);
        
        $this->userEntities->save($user);
        
        return new UserOutputDto($user);
	}
 }
