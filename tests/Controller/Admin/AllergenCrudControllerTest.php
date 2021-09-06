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

        // $linkCrawler = $crawler->selectLink('#main-menu');
        // $linkCrawler = $crawler->filter('.menu');
        // $linkCrawler = $crawler->filter('.menu-item has-submenu');
        // $linkCrawler = $crawler->filter('.submenu');
        // $linkCrawler = $crawler->filter('.menu-item');
        // $linkCrawler = $crawler->filter('.menu-icon .fa-fw .fas .fa-allergies');
        // // $linkCrawler = $crawler->filter('.submenu');
        
        // // $linkCrawler = $crawler->filter('Liste');

        // $link = $linkCrawler->link();

        // $client->click($link);

        $this->assertResponseStatusCodeSame(200);
    }

}
