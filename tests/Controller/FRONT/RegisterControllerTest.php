<?php

namespace App\Tests\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegisterAddGET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/mon-compte/creation');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Page d\'inscription');
    }

    public function testRegisterAddGPOST(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/mon-compte/creation');

        // $buttonCrawler = $crawler->selectButton('Ajouter');
        // $form = $buttonCrawler->form();

        // $form['register[email]'] = "email@email.fr";
        // $form['register[password][first]'] = "Password";
        // $form['register[password][second]'] = "Password";

        // $client->submit($form);

        // $crawler = $client->request('POST', '/mon-compte/creation');
        // $this->assertResponseIsSuccessful();

        $client->submitForm('Ajouter', [
            'register[email]' => "email@email.fr",
            'register[password][first]' => "Password",
            'register[password][second]' => "Password",
        ]);

        $this->assertResponseIsSuccessful();
    }
}
