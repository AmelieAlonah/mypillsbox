<?php

namespace App\Tests\Controller\BACK;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsControllerTest extends WebTestCase
{
    public function testBONewsBrowse(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/liste');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page des news');
    }

    public function testBONewsRead(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/voir/0');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page de la news');
    }

    public function testBONewsAddGET(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'ajout de news');
    }

    public function testBONewsAddPOST(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/ajout');

        $buttonCrawler = $crawler->selectButton('Ajouter');
        $form = $buttonCrawler->form();

        $form['news[title]'] = "Titre";
        $form['news[content]'] = "Contenu";

        $client->submit($form);

        $crawler = $client->request('POST', '/back-office/news/ajout');
        $this->assertResponseIsSuccessful();
    }

    public function testBONewsUpdate(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/edition/0');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'édition de news');
    }

    public function testBONewsUpdatePOST(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/edition/1');

        $buttonCrawler = $crawler->selectButton('Ajouter');
        $form = $buttonCrawler->form();

        $form['news[title]'] = "Titre";
        $form['news[content]'] = "Contenu";

        $client->submit($form);

        $crawler = $client->request('POST', '/back-office/news/edition/1');
        $this->assertResponseIsSuccessful();
    }

    public function testBONewsDelete(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/news/edition/0');

        $this->assertResponseIsSuccessful();
    }
}
