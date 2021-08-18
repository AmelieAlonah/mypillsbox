<?php

namespace App\Controller\BACK;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/back-office", name="back-office_home")
     */
    public function BackHome(): Response
    {
        return $this->render('BACK/home.html.twig');
    }
}
