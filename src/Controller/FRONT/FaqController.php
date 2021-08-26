<?php

namespace App\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{
    /**
     * @Route("/faq", name="faq_browse")
     */
    public function browse(): Response
    {
        return $this->render('FRONT/faq/browse.html.twig');
    }
}
