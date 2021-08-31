<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfosControllerTest extends WebTestCase
{
    public function testInfosContactGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de contact');
    }

    public function testInfosContactPOST(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $buttonCrawler = $crawler->selectButton('Envoyer');
        $form = $buttonCrawler->form();
        
        $form['message[name]'] = "Amelie";
        $form['message[email]'] = "email@email.fr";
        $form['message[content]'] = "Contenu";

        $client->submit($form);

        $crawler = $client->request('POST', '/contact');
        $this->assertResponseIsSuccessful();
    }

    public function testInfosCGU(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/cgu');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des conditions générales d\'utillisation');
    }

    public function testInfosMentions(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/mentions-legales');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des mentions légales');
    }

    public function testInfosWho(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/qui-suis-je');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des infos secrètes de MyPillsBox');
    }
}
