<?php

namespace App\BusinnesController\Common;

use App\BusinnesService\EncoderServiceInterface;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Output\CreateAccountOutputDto;
use App\Entity\UserEntity;
use Exception;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use function PHPUnit\Framework\throwException;

class CreateAccountController
{
    private UserRepository $userRepository;
    private EncoderServiceInterface $encoderService;
    private JWTTokenManagerInterface $JWTTokenManager;
    
    public function __construct
    (
        UserRepository $userRepository,
        EncoderServiceInterface $encoderService,
        JWTTokenManagerInterface $JWTTokenManager
    )
    {
        assert($userRepository !== null);
        assert($encoderService !== null);
        assert($JWTTokenManager !== null);
        
        $this->userRepository = $userRepository;
        $this->encoderService = $encoderService;
        $this->JWTTokenManager = $JWTTokenManager;
    }
 
	public function createAccount(UserInputDto $userDto) : CreateAccountOutputDto
	{
        assert($userDto !== null);
        
        $user = new UserEntity($userDto->getUserName(), $userDto->getPassword());
        $this->encoderService->encodeUserPassword($user);
        $this->userRepository->save($user);
        
        return new CreateAccountOutputDto($this->JWTTokenManager->create($user));
	}
 }
