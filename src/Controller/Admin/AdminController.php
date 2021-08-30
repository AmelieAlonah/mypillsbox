<?php

namespace App\Controller\Admin;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use App\Entity\BACK\User;
use App\Entity\FRONT\Message;
use App\Entity\FRONT\News;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(AllergenCrudController::class)->generateUrl());
        return parent::index();

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyPillsBox');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Users', "fas fa-users", User::class);

        yield MenuItem::linkToCrud('Allergen', 'fas fa-allergies', Allergen::class);
        yield MenuItem::linkToCrud('Medicine', "fas fa-tablets", Medicine::class);

        yield MenuItem::linkToCrud('Message', "fas fa-voicemail", Message::class);
        yield MenuItem::linkToCrud('News', "far fa-newspaper", News::class);
        
    }
}
