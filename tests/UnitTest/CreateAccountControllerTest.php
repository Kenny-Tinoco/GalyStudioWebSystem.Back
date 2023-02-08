<?php

namespace App\Tests\UnitTest;

use App\BusinnesController\Common\CreateAccountController;
use App\BusinnesService\EncoderServiceInterface;
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
    private MockObject|JWTTokenManagerInterface $JWTTokenManager;
    
    private MockObject|UserInputDto $userInputDto;
    
    private MockObject|CreateAccountController $createAccountController;
    
    protected function setUp(): void
    {
        parent ::setUp();
        
        $this->userRepository = $this->getMockShort(UserRepository::class);
        $this->encoderService = $this->getMockShort(EncoderServiceInterface::class);
        $this->JWTTokenManager = $this->getMockShort(JWTTokenManagerInterface::class);
        
        $this->userInputDto = $this->getMockShort(UserInputDto::class);
        
        $this->createAccountController = new CreateAccountController
        (
            $this->userRepository,
            $this->encoderService,
            $this->JWTTokenManager
        );
    }
    
    public function testCreateAccount() : void
    {
        $this->userInputDto->method('getUserName')->willReturn('Prueba1');
        $this->userInputDto->method('getPassword')->willReturn('ContraseñaPrueba1');
    
        $this->encoderService
            ->expects($this->exactly(1))
            ->method('encodeUserPassword')
            ->with($this->isInstanceOf(UserEntity::class));
    
        $this->userRepository
            ->expects($this->exactly(1))
            ->method('save')
            ->with($this->isInstanceOf(UserEntity::class));
    
        $this->JWTTokenManager
            ->expects($this->exactly(1))
            ->method('create')
            ->with($this->isInstanceOf(UserEntity::class))
            ->willReturn('my-json-web-token');
    
        $result = $this->createAccountController->createAccount($this->userInputDto);
        
        self::assertIsString($result->token);
    }
    
    private function getMockShort(string $className)
    {
        return $this->getMockBuilder($className)->disableOriginalConstructor()->getMock();
    }
}
