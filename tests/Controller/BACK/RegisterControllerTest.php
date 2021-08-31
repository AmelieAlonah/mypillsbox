<?php

namespace App\Tests\Controller\BACK;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegisterAdd(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/utilisateurs/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'ajout d\'utilisateurs');
    }
}
