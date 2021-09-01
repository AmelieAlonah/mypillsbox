<?php

namespace App\Tests\Controller\Admin;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AllergenCrudControllerTest extends WebTestCase
{
    public function testAdminAllergen(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);
        $crawler = $client->request('GET', '/admin');

        $linkCrawler = $crawler->selectLink('Allergen');

        $this->assertResponseStatusCodeSame(302);
    }

}
