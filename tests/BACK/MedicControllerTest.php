<?php

namespace App\Tests\BACK;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicControllerTest extends WebTestCase
{
    public function testBrowse(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/liste');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Les médicaments !');
    }

    public function testRead(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/voir/1');

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

    public function testUpdate(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/edition/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Modifier un médicament !');
    }

}
