<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SearchControllerTest extends WebTestCase
{
    public function testSearchBarGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/recherche');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de recherche de médicament');
    }

    public function testSearchBarPOST(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/recherche');

        $client->submitForm('Rechercher', [
            'search[name]' => "Doliprane"
        ],
        'POST');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de vos résultats de recherche :');
    }

    public function testSearchBarMedicine():void
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->request('GET', '/recherche/medicament/voir/33');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'La page de votre médicament.');
    }

    public function testSearchBarMedicineKO():void
    {
        $client = static::createClient();

        $client->catchExceptions(true);

        $client->request('GET', '/recherche/medicament/voir/33');

        $this->assertResponseStatusCodeSame(404);
        $this->assertSelectorTextNotContains('h1', 'La page de votre médicament.');
        
    }

    public function testSearchBarAllergen():void
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->request('GET', '/recherche/allergene/voir/33');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de l\'allergène');
    }

    public function testSearchBarAllergenKO():void
    {
        $client = static::createClient();

        $client->catchExceptions(true);

        $client->request('GET', '/recherche/allergene/voir/33');

        $this->assertResponseStatusCodeSame(404);
        $this->assertSelectorTextNotContains('h1', 'Page de l\'allergène');
    }

}
