<?php

namespace App\Controller\FRONT;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfosController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods="GET")
     */
    public function infosContact(): Response
    {
        return $this->render('FRONT/infos/contact.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu", methods="GET")
     */
    public function infosCGU(): Response
    {
        return $this->render('FRONT/infos/cgu.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions_legales", methods="GET")
     */
    public function infosMentions(): Response
    {
        return $this->render('FRONT/infos/mentions_legales.html.twig');
    }

    /**
     * @Route("/qui-suis-je", name="me", methods="GET")
     */
    public function infosWho(): Response
    {
        return $this->render('FRONT/infos/who.html.twig');
    }
}
