<?php

namespace App\Tests\Controller\BACK;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testBackHome(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-office : Page d\'accueil');
    }
}
