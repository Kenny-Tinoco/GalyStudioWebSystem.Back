<?php

namespace App\Tests\UnitTest;

use App\BusinnesController\Common\LoginController;
use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use App\Dto\Input\UserInputDto;
use App\Dto\Input\UserLoginDto;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginControllerTest extends TestCase
{
    private MockObject|SessionEntity $sessionEntity;
    private MockObject|UserRepository $userRepository;
    private MockObject|UserPasswordHasherInterface $userPasswordHasher;
    private MockObject|UserLoginDto $userLoginDto;
    private MockObject|UserInputDto $userInputDto;
    
    private MockObject|LoginController $loginController;
    
    protected function setUp(): void
    {
        parent ::setUp();
        
        $this->sessionEntity = $this->getMockBuilder(SessionEntity::class)->disableOriginalConstructor()->getMock();
        $this->userRepository = $this->getMockBuilder(UserRepository::class)->disableOriginalConstructor()->getMock();
        $this->userPasswordHasher = $this->getMockBuilder(UserPasswordHasherInterface::class)->disableOriginalConstructor()->getMock();
        $this->userLoginDto = $this->getMockBuilder(UserLoginDto::class)->disableOriginalConstructor()->getMock();
        $this->userInputDto = $this->getMockShort(UserInputDto::class);
        
        $this->loginController = new LoginController($this->userRepository, $this->sessionEntity, $this->userPasswordHasher);
    }
    
    public function testLogin() : void
    {
        $this->userLoginDto->method('getUserName')->willReturn('Jordan');
        $this->userLoginDto->method('getPassword')->willReturn('Kt#cuenta00');
    
        $this->loginController->login($this->userLoginDto);
    }
    
    public function testCreateAccount() : void
    {
        $this->userInputDto->method('getUserName')->willReturn('Prueba1');
        $this->userInputDto->method('getPassword')->willReturn('ContraseñaPrueba1');
    
        $this->loginController->createAccount($this->userInputDto);
    }
    
    private function getMockShort(string $className) : MockObject
    {
        return $this->getMockBuilder($className)->disableOriginalConstructor()->getMock();
    }
    
}