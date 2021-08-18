<?php

namespace App\Controller\FRONT;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfosController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
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

    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function infosMentions(): Response
    {
        return $this->render('FRONT/infos/mentions_legales.html.twig');
    }

    /**
     * @Route("/qui-suis-je", name="me")
     */
    public function infosWho(): Response
    {
        return $this->render('FRONT/infos/who.html.twig');
    }
}
