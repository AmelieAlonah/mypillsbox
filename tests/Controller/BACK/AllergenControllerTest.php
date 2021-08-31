<?php

namespace App\Tests\Controller\BACK;

use App\Entity\BACK\Allergen;
use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AllergenControllerTest extends WebTestCase
{
    public function testBOAllergenBrowse(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/allergene/liste');


        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page des allergènes');
    }

    public function testBOAllergenRead(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/allergene/voir/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page de l\'allergène');
    }

    public function testBOAllergenAdd(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/allergene/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'ajout d\'allergènes');
    }

    public function testBOAllergenUpdate(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/allergene/edition/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'édition d\'allergènes');
    }

    public function testBOAllergenDelete(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/allergene/suppression/1');

        $this->assertResponseIsSuccessful();
        $this->assertResponseRedirects(200);

    }
}
