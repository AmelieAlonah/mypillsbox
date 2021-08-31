<?php

namespace App\Tests\Controller\Admin;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAdminIndex(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(302);
    }

}
