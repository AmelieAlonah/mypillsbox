<?php

namespace App\Tests\Controller\BACK;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MedicControllerTest extends WebTestCase
{
    public function testBOMedicBrowse(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/liste');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page des médicaments');
    }

    public function testBOMedicRead(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/voir/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page du médicament');
    }

    public function testBOMedicAdd(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'ajout de médicaments');
    }

    public function testBOMedicUpdate(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/edition/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\édition du médicament');
    }

    public function testBOMedicDelete(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/suppression/1');

        $this->assertResponseIsSuccessful();
    }
}
