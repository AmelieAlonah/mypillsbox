<?php

namespace App\Tests\BACK;

use App\Controller\BACK\MedicController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedicControllerTest extends WebTestCase
{
    /**
     * Medicine list
     */
    public function testBrowse(): Void
    {   
        $client = static::createClient();
        $crawler = $client->request('GET', '/back-office/medicament/liste');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'La liste des médicaments :');
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

    // public function testDelete(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/back-office/medicament/liste');

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'La liste des médicaments :');

    // }

}
