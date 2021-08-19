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

    public function testRead(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Le médicament !');
    }

    public function testAdd(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ajouter un médicament !');
    }

}
