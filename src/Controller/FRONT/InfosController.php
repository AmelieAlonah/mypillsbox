<?php

namespace App\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfosController extends AbstractController
{
    /**
     * @Route("/contact", name="infosContact")
     */
    public function infosContact(): Response
    {
        return $this->render('FRONT/infos/contact.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function infosCGU(): Response
    {
        return $this->render('FRONT/infos/cgu.html.twig');
    }
}
