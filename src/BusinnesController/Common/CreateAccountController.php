<?php

namespace App\BusinnesController\Common;

use App\BusinnesService\EncoderServiceInterface;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Output\CreateAccountOutputDto;
use App\Entity\UserEntity;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class CreateAccountController
{
    private UserRepository $userEntities;
    private EncoderServiceInterface $encoderService;
    private JWTTokenManagerInterface $JWTTokenManager;
    
    public function __construct
    (
        UserRepository $userEntities,
        EncoderServiceInterface $encoderService,
        JWTTokenManagerInterface $JWTToken
    )
    {
        assert($userEntities !== null);
        assert($encoderService !== null);
        assert($JWTToken !== null);
        
        $this->userEntities = $userEntities;
        $this->encoderService = $encoderService;
        $this->JWTTokenManager = $JWTToken;
    }
 
	public function createAccount(UserInputDto $userDto) : CreateAccountOutputDto
	{
        assert($userDto !== null);
        $user = new UserEntity($userDto->getUserName(), $userDto->getPassword());
        $this->encoderService->encodeUserPassword($user);
        $this->userEntities->save($user);
        
        return new CreateAccountOutputDto($this->JWTTokenManager->create($user));
	}
 }
