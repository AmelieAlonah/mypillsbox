<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error404", name="error404")
     */
    public function error404(): Response
    {
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
    }

    
}
