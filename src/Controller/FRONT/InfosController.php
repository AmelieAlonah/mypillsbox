<?php

namespace App\Controller\FRONT;

use App\Entity\FRONT\Message;
use App\Form\FRONT\MessageType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfosController extends AbstractController
{
    /**
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     */
    public function infosContact(Request $request): Response
    {
        $message = new Message;

        $formMessage = $this->createForm(MessageType::class, $message);
        $formMessage->handleRequest($request);

        if($formMessage->isSubmitted() && $formMessage->isValid())
        {
            $em =$this->getDoctrine()->getManager();

            $em->persist($message);
            $em->flush();

            $this->addFlash('success', "Votre message est bien envoyé.");

            return $this->redirectToRoute('home');
        }

        if($formMessage->isSubmitted() && !$formMessage->isValid())
        {
            $this->addFlash('danger', "Votre message n'a pas été envoyé.");
        }

        return $this->render('FRONT/infos/contact.html.twig', [
            'formMessage' => $formMessage->createView()
        ]);
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
