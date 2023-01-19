<?php

namespace App\Tests\UnitTest;

use App\ApiController\LoginAction;
use App\BusinnesController\Common\LoginController;
use App\Dto\Input\UserLoginDto;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class LoginActionTest extends TestCase
{
    private MockObject|LoginController $loginController;
    private MockObject|UserLoginDto $userLoginDto;
    
    private MockObject|LoginAction $loginAction;
    
    public function setUp(): void
    {
        parent ::setUp();
        
        $this->loginController = $this->getMockBuilder(LoginController::class)->disableOriginalConstructor()->getMock();
        $this->userLoginDto = $this->getMockBuilder(UserLoginDto::class)->disableOriginalConstructor()->getMock();
        
        $this->loginAction = new LoginAction($this->loginController);
    }
    
    public function testLoginAction() : void
    {
        $this->userLoginDto->method('getUserName')->willReturn('Jordan');
        $this->userLoginDto->method('getPassword')->willReturn('Kt#cuenta00');
        
        $this->loginAction->__invoke($this->userLoginDto);
    }
}