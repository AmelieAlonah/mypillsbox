<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegisterAddGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/mon-compte/creation');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page d\'inscription');
    }
}
