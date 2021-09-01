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

    public function testBOMedicReadKO(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(true);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/voir/1');

        $this->assertResponseStatusCodeSame(404);
        $this->assertSelectorTextNotContains('h1', 'Back-Office : Page du médicament');
    }

    public function testBOMedicAddGET(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/ajout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Back-Office : Page d\'ajout de médicaments');
    }

    public function testBOMedicAddPOST(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/ajout');

        $buttonCrawler = $crawler->selectButton('Ajouter');
        $form = $buttonCrawler->form();

        $form['medicine[name]'] = "Name";
        $form['medicine[code_CIS]'] = "code_CIS";
        $form['medicine[medic_type]'] = "medic_type";
        $form['medicine[medic_condition]'] = "medic_condition";
        $form['medicine[medic_dosage]'] = "medic_dosage";
        $form['medicine[medic_exeption]'] = "medic_exeption";
        $form['medicine[medic_method_administration]'] = "medic_method_administration";
        $form['medicine[medic_danger]'] = "medic_danger";
        $form['medicine[medic_dosage_max]'] = "medic_dosage_max";
        $form['medicine[medic_interaction_other_medic]'] = "medic_interaction_other_medic";
        $form['medicine[fertily_pregnancy_breastfeeding]'] = "fertily_pregnancy_breastfeeding";
        $form['medicine[medic_adverse_reaction]'] = "medic_adverse_reaction";
        $form['medicine[id_CPD]'] = 1;

        $client->submit($form);

        $crawler = $client->request('POST', '/back-office/medicament/ajout');
        $this->assertResponseIsSuccessful();
    }

    public function testBOMedicUpdateGET(): void
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

    public function testBOMedicUpdateKO(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(true);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/edition/1');

        $this->assertResponseStatusCodeSame(404);
        $this->assertSelectorTextNotContains('h1', 'Back-Office : Page d\édition du médicament');
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
        $this->assertResponseStatusCodeSame(302);
    }

    public function testBOMedicDeleteKO(): void
    {
        $client = static::createClient();

        $userRepository = static::getContainer()->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@admin.fr');

        $client->catchExceptions(true);

        $client->loginUser($testUser);

        $crawler = $client->request('GET', '/back-office/medicament/suppression/1');

        $this->assertResponseStatusCodeSame(404);
    }
}
