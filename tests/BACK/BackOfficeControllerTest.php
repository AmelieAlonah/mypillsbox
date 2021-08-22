<?php

namespace App\Tests\BACK;

use App\Controller\BACK\MedicController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BackOfficeControllerTest extends WebTestCase
{
    /**
     * Access OK (200)
     * 
     * @dataProvider accessOK
     */
    public function testAccessOK($method, $url): Void
    {   
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('admin@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request($method, $url);

        $this->assertResponseIsSuccessful();
    }

    public function accessOK()
    {
        yield ['GET', '/back-office'];
        yield ['GET', '/back-office/medicament/liste'];
        yield ['GET', '/back-office/medicament/voir/1'];
        yield ['GET', '/back-office/medicament/ajout'];
        yield ['GET', '/back-office/medicament/edition/1'];
        yield ['GET', '/back-office/medicament/supression/1'];
    }

}
