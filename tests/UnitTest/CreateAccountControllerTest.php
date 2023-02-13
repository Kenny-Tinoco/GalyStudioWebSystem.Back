<?php

namespace App\Tests\UnitTest;

use App\BusinessService\EncoderServiceInterface;
use App\BusinessController\Common\CreateAccountController;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Entity\UserEntity;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CreateAccountControllerTest extends TestCase
{
    private MockObject|UserRepository $userRepository;
    private MockObject|EncoderServiceInterface $encoderService;
    private MockObject|JWTTokenManagerInterface $jwtTokenManager;
    
    private MockObject|UserInputDto $userInputDto;
    
    private MockObject|CreateAccountController $createAccountController;
    
    protected function setUp(): void
    {
        parent ::setUp();
        
        $this->userRepository = $this->getMockShort(UserRepository::class);
        $this->encoderService = $this->getMockShort(EncoderServiceInterface::class);
        $this->jwtTokenManager = $this->getMockShort(JWTTokenManagerInterface::class);
        
        $this->userInputDto = $this->getMockShort(UserInputDto::class);
        
        $this->createAccountController = new CreateAccountController
        (
            $this->userRepository,
            $this->encoderService,
            $this->jwtTokenManager
        );
    }
    
    public function testCreateAccount() : void
    {
        $this->userInputDto->method('getUserName')->willReturn('test-username');
        $this->userInputDto->method('getPassword')->willReturn('test-password');
    
        $this->encoderService
            ->expects($this->exactly(1))
            ->method('encodeUserPassword')
            ->with($this->isInstanceOf(UserEntity::class));
    
        $this->userRepository
            ->expects($this->exactly(1))
            ->method('save')
            ->with($this->isInstanceOf(UserEntity::class));
    
        $this->jwtTokenManager
            ->expects($this->exactly(1))
            ->method('create')
            ->with($this->isInstanceOf(UserEntity::class))
            ->willReturn('the-json-web-token');
    
        $result = $this->createAccountController->createAccount($this->userInputDto);
        
        self::assertIsString($result->token);
    }
    
    private function getMockShort(string $className)
    {
        return $this->getMockBuilder($className)->disableOriginalConstructor()->getMock();
    }
}
