<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de connexion');
    }

    public function testLoginWhenLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');

        $buttonCrawler = $crawler->selectButton('Me connecter');
        $form = $buttonCrawler->form();

        $form = $buttonCrawler->form([
            'email'     => 'test@admin.fr',
            'password'  => 'test'
        ]);

        $client->submit($form);

        $crawler = $client->request('GET', 'connexion');
        $this->assertResponseIsSuccessful();
    }

    public function testLogout(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/deconnexion');

        $this->assertResponseStatusCodeSame(302);
    }
}
