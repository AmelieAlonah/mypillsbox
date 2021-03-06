<?php

namespace App\Controller\BACK;

use App\Entity\BACK\User;
use App\Form\BACK\RegisterType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    

    /**
     * @Route("/back-office/utilisateurs/ajout", name="back_office_user_add", methods={"GET", "POST"})
     */
    public function registerAdd(Request $request, UserPasswordHasherInterface $userPasswordHasherInterface, MailerInterface $mailer): Response
    {
        $user = new User();
        
        $formUser = $this->createForm(RegisterType::class, $user);
        $formUser->handleRequest($request);

        if($formUser->isSubmitted() && $formUser->isValid())
        {
            // $password = $formUser->get('password')->getData();
            // $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $user->getPassword());
            // $user->setPassword($hashedPassword);

            $user->setPassword(
                $userPasswordHasherInterface->hashPassword(
                    $user,
                    $formUser->get('password')->getData()
                )
            );

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'L\'utilisateur a bien été ajouté.');

            $mail = (new TemplatedEmail())
                ->from('mypillsbox@gmail.com')
                ->to($user->getEmail())
                ->subject('Bienvenue sur MyPillsBox')
                ->htmlTemplate('mailer/welcome.html.twig')
                ->context([
                    'user' => $user,
                ]);

            $mailer->send($mail);

            return $this->redirectToRoute('back_office_home');
        }
        elseif($formUser->isSubmitted() && !$formUser->isValid())
        {
            $this->addFlash('danger', 'L\'utilisateur n\'a pas été enregistré.');
        }

        return $this->render('BACK/register/add.html.twig', [
            'user'      => $user,
            'formUser'  => $formUser->createView()
        ]);
    }
}
