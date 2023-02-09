<?php

namespace App\BusinessController\Common;

use App\BusinessService\EncoderServiceInterface;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Output\CreateAccountOutputDto;
use App\Entity\UserEntity;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class CreateAccountController
{
    private UserRepository $userRepository;
    private EncoderServiceInterface $encoderService;
    private JWTTokenManagerInterface $jwtTokenManager;
    
    public function __construct( UserRepository $userRepository, EncoderServiceInterface $encoderService, JWTTokenManagerInterface $jwtTokenManager)
    {
        assert($userRepository !== null);
        assert($encoderService !== null);
        assert($jwtTokenManager !== null);
        
        $this->userRepository = $userRepository;
        $this->encoderService = $encoderService;
        $this->jwtTokenManager = $jwtTokenManager;
    }
 
	public function createAccount(UserInputDto $userDto) : CreateAccountOutputDto
	{
        assert($userDto !== null);
        
        $user = new UserEntity($userDto->getUserName(), $userDto->getPassword());
        $this->encoderService->encodeUserPassword($user);
        $this->userRepository->save($user);
        
        return new CreateAccountOutputDto($this->jwtTokenManager->create($user));
	}
 }
