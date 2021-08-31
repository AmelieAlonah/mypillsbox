<?php

namespace App\Tests\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SearchControllerTest extends WebTestCase
{
    // public function testSearchBar(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/recherche');

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'Page de recherche de médicament');
    // }

    // public function testSeachRead(): void
    // {
    //     $client = static::createClient();

    //     $client->catchExceptions(false);
    //     $this->expectException(NotFoundHttpException::class);

    //     $client->request('GET', '/medicament/voir/33');

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'La page de votre médicament.');
    // }
}
