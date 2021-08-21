<?php

namespace App\Tests\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{
    public function testSearchBar(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/recherche');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de recherche de médicament');
    }
}
