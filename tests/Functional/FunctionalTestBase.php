<?php

namespace App\Tests\Functional;

use Hautelook\AliceBundle\PhpUnit\RecreateDatabaseTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTestBase extends WebTestCase
{
    use RecreateDatabaseTrait;
    
    private static ?KernelBrowser $client = null;
    protected static ?KernelBrowser $baseClient = null;
    protected static ?KernelBrowser $authenticatedClient = null;
    
    public function setUp(): void
    {
        parent::setUp();
        
        if (null === self::$client)
        {
            self::$client = static::createClient();
        }
        
        if (null === self::$baseClient)
        {
            self::$baseClient = clone self::$client;
            self::$baseClient->setServerParameters
            ([
                'CONTENT_TYPE' => 'application/json',
                'HTTP_ACCEPT' => 'application/json',
            ]);
        }
    }
}
