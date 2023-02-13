<?php

namespace App\Tests\Functional;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginCheckTest extends FunctionalTestBase
{
    private const ENDPOINT1 = '/api/v1/login-check';
    
    public function testLoginCheck(): void
    {
        $payload = [ 'username' => 'user-test-#1', 'password' => 'user-test-password'];
        
        self::$baseClient -> request(Request::METHOD_GET, self::ENDPOINT1, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient -> getResponse();
        self::assertEquals(Response::HTTP_OK, $response -> getStatusCode());
        
        $responseData = \json_decode($response -> getContent(), true);
        self::assertArrayHasKey('token', $responseData);
    }
}
