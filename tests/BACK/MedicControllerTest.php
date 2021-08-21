<?php

namespace App\Tests\BACK;

use App\Controller\BACK\MedicController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function testReadGET(): void
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);
        
        $client->request('GET', '/back-office/medicament/voir/33');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Doliprane 1000 mg comprimé n° 2');
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

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $crawler = $client->request('GET', '/back-office/medicament/suppression/1');

        $this->assertResponseIsSuccessful();
    }

}
