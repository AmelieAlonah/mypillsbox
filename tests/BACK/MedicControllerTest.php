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

    public function testAddGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Ajouter un médicament !');
    }

    public function testUpdateGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/edition/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Modifier un médicament !');
    }

    public function testDelete(): void
    {
        $client = static::createClient();
        $crawler = $client->request('DELETE', '/back-office/medicament/suppression/1');

        $this->assertResponseIsSuccessful();
    }

}
