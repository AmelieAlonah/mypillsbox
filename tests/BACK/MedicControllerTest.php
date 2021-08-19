<?php

namespace App\Tests\BACK;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicControllerTest extends WebTestCase
{
    public function testBrowse(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Les médicaments !');
    }

}
