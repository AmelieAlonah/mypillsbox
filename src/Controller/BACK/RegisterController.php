<?php

namespace App\Controller\BACK;

use App\Entity\User;
use App\Form\BACK\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterController extends AbstractController
{
    /**
     * @Route("/back-office/utilisateurs/ajout", name="/back_office_user_add", methods={"GET"})
     */
    public function registerAdd(Request $request): Response
    {
        $user = new User();
        
        $formUser = $this->createForm(RegisterType::class, $user);
        $formUser->handleRequest($request);

        if($formUser->isSubmitted() && $formUser->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('succes', 'L\'utilisateur a bien été ajouté.');
        }
        else
        {
            $this->addFlash('danger', 'L\'utilisateur n\'a pas été enregistré.');
        }

        return $this->render('back/register/add.html.twig', [
            'formUser' => $formUser->createView()
        ]);
    }
}
