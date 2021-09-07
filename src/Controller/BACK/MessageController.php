<?php

namespace App\Controller\BACK;

use App\Entity\FRONT\Message;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessageController extends AbstractController
{
    /**
     * @Route("/back-office/message/liste", name="back_office_message_browse")
     */
    public function browse(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Message::class);
        $messages  = $repository->findAll();

        return $this->render('BACK/message/browse.html.twig', [
            "messages" => $messages
        ]);
    }
}
