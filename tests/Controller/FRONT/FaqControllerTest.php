<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FaqControllerTest extends WebTestCase
{
    public function testFaqBrowse(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/faq');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de la Foire Aux Questions');
    }
}
