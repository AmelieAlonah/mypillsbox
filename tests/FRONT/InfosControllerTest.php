<?php

namespace App\Tests\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InfosControllerTest extends WebTestCase
{
    public function testInfosContact(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page de contact');
    }

    public function testInfosCGU(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/cgu');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des CGU');
    }

    public function testInfosMentions(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/mentions-legales');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page des Mentions Légales');
    }

    public function testInfosWho(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/qui-suis-je');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Qui suis-je ?');
    }

}
