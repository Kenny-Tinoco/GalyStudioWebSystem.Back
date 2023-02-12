<?php

namespace App\Tests\Functional;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CreateAccountAction extends FunctionalTestBase
{
    private const ENDPOINT = '/api/v1/users';
    
    public function testCreateAccountAction(): void
    {
        $payload =
            [
                'username' => 'user-test-#1',
                'password' => 'user-test-password',
                'roles' => ''
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        
        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $responseData = \json_decode($response->getContent(), true);
        self::assertArrayHasKey('token', $responseData);
    }
    
    public function testRegisterActionWithInvalidUserName(): void
    {
        $payload =
            [
                'userName' => '',
                'password' => 'user-test-password',
                'roles' => ''
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        
        self::assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
    }
    
    public function testRegisterActionWithInvalidPassword(): void
    {
        $payload =
            [
                'userName' => 'user-test-#1',
                'password' => '',
                'roles' => ''
            ];
        
        self::$baseClient->request(Request::METHOD_POST, self::ENDPOINT, [], [], [], \json_encode($payload));
        
        $response = self::$baseClient->getResponse();
        
        self::assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
    }
}