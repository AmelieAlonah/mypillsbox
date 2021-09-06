<?php

namespace App\Tests\Controller\Admin;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsCrudControllerTest extends WebTestCase
{
    public function testAdminNews(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);
        $crawler = $client->request('GET', '/admin');

        $linkCrawler = $crawler->selectLink('News');

        $this->assertResponseStatusCodeSame(200);
    }
}
