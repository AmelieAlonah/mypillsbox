<?php

namespace App\Tests\BACK;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testHome(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Le back-office !');
    }
}
