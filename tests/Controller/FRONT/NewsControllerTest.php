<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsControllerTest extends WebTestCase
{
    public function testNewsBrowse(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/news');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des news');
    }
}
