<?php

namespace App\Tests;

use App\Repository\BACK\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ErrorControllerTest extends WebTestCase
{
    public function testError404(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/error404');

        $this->assertSelectorTextContains('h1', 'Page introuvable');
    }

    public function testError403(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/error403');

        $this->assertSelectorTextContains('h1', 'Page interdite');
    }

    public function testError404GET(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/dfgeg');

        $this->assertResponseStatusCodeSame(404);
    }

    public function testError403Redirect(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin');

        $this->assertResponseRedirects();
    }

    /**
     * Access KO
     * 
     * @dataProvider accessKO
     */
    public function testAccessKO($method, $url): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@user.fr');

        $client->loginUser($testUser);

        $crawler = $client->request($method, $url);

        $this->assertResponseStatusCodeSame(403);
    }

    /**
     * Access NotFound
     * 
     * @dataProvider accessNotFound
     */
    public function testAccessNotFound($method, $url): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);
        
        $client->loginUser($testUser);

        $crawler = $client->request($method, $url);

        $this->assertResponseStatusCodeSame(404);
    }

    public function accessKO()
    {
        yield ['GET', '/admin'];
        yield ['GET', '/back-office'];
        yield ['GET', '/back-office/medicament/liste'];
        yield ['GET', '/back-office/medicament/ajout'];
    }

    public function accessNotFound()
    {
        yield ['GET', '/back-office/medicament/voir/1'];
        yield ['GET', '/back-office/medicament/edition/1'];
        yield ['GET', '/back-office/medicament/supression/121'];

    }
}
