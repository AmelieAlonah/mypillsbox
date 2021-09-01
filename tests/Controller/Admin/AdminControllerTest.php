<?php

namespace App\Tests\Controller\Admin;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\CssSelector\CssSelectorConverter;

class AdminControllerTest extends WebTestCase
{
    public function testAdminIndex(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/admin');

        $this->assertResponseStatusCodeSame(200);
    }

    public function testLink(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/admin');

        $linkCrawler = $crawler->filter('#main-menu');
        $linkCrawler = $crawler->filter('.menu');
        $linkCrawler = $crawler->filter('.menu-item');
        $linkCrawler = $crawler->filter('a');

        $link = $linkCrawler->link();

        $client->click($link);

        $this->assertResponseIsSuccessful();
    }
}
