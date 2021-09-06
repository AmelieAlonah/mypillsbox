<?php

namespace App\Controller\Admin;

use App\Entity\FRONT\News;
use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use App\Entity\BACK\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $repositoryAllergen = $this->getDoctrine()->getRepository(Allergen::class);
        $allergens  = $repositoryAllergen->findAll();

        $repositoryMedicine = $this->getDoctrine()->getRepository(Medicine::class);
        $medicines  = $repositoryMedicine->findAll();

        $repositoryUser = $this->getDoctrine()->getRepository(User::class);
        $users  = $repositoryUser->findAll();

        $allergensNB = count($allergens);
        $medicinesNB = count($medicines);
        $userNB = count($users);

        return $this->render('bundles/EasyAdmin/dashbord.html.twig', [
            'NbAllergens' => $allergensNB,
            'NbMedicines' => $medicinesNB,
            'NbUsers' => $userNB
        ]);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyPillsBox');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('MyPillsBox');
        yield MenuItem::linkToRoute('Accueil', 'fa fa-home', 'home');
        yield MenuItem::linkToRoute('Accueil Back-Office', 'fa fa-home', 'back_office_home');
        yield MenuItem::linkToLogout('Se déconnecter', 'fa fa-sign-out-alt', 'app_logout');

        yield MenuItem::section('Administration');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Médicaments et allergènes');
        yield MenuItem::subMenu('Médicaments', 'fas fa-tablets')->setSubItems([
            MenuItem::linkToCrud('Liste', "fas fa-list", Medicine::class)
                ->setDefaultSort(['name' => 'ASC']),
            MenuItem::linkToCrud('Ajouter',  "far fa-plus-square", Medicine::class)
                ->setAction('new'),
        ]);
        yield MenuItem::subMenu('Allergènes', 'fas fa-allergies')->setSubItems([
            MenuItem::linkToCrud('Liste', 'fas fa-list', Allergen::class)
                ->setDefaultSort(['name' => 'ASC']),
            MenuItem::linkToCrud('Ajouter', "far fa-plus-square", Allergen::class)
                ->setAction('new'),
        ]);
        
        yield MenuItem::section('Autres');
        yield MenuItem::subMenu('News', "far fa-newspaper")->setSubItems([
            MenuItem::linkToCrud('News', "fas fa-list", News::class)
                ->setDefaultSort(['id' => 'DESC']),
            MenuItem::linkToCrud('Ajouter', "far fa-plus-square", News::class)
                ->setAction('new'),
        ]);
        
    }
}
