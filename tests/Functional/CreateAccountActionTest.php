<?php

namespace App\Tests\Functional;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CreateAccountActionTest extends FunctionalTestBase
{
    private const ENDPOINT = '/api/v1/users';
    
    public function testCreateAccountAction(): void
    {
        $payload =
            [
                'username' => 'user-test-#2',
                'password' => 'user-test-password'
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        
        $responseData = \json_decode($response->getContent(), true);
        self::assertArrayHasKey('token', $responseData);
    }
    
    public function testCreateAccountActionWithInvalidUserName(): void
    {
        $payload =
            [
                'username' => '',
                'password' => 'user-test-password'
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        
        self::assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
    }
    
    public function testCreateAccountActionWithInvalidPassword(): void
    {
        $payload =
            [
                'username' => 'user-test-#3',
                'password' => ''
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        
        self::assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
    }
}
