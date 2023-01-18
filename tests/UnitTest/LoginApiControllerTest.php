<?php

namespace App\Tests\UnitTest;

use App\BusinnesController\Common\LoginController;
use App\Common\SessionEntity;
use App\Dao\Repository\UserRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class LoginApiControllerTest extends TestCase
{
    private MockObject|LoginController $loginController;
    
    public function setUp(): void
    {
        parent ::setUp();
        
        $this->loginController = $this->getMockBuilder(LoginController::class)->disableOriginalConstructor()->getMock();
    }
}