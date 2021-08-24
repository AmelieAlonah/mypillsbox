<?php

namespace App\Controller\BACK;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/back-office", name="back_office_home")
     */
    public function BackHome(): Response
    {
        return $this->render('BACK/home.html.twig');
    }
}
