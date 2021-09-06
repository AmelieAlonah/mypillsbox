<?php

namespace App\Controller\FRONT;

use App\Entity\BACK\User;
use App\Form\FRONT\RegisterType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{

    /**
     * @Route("/mon-compte/voir/{id<\d+>}", name="account_read", methods={"GET"})
     */
    public function registerRead(User $user = null): Response
    {
        if( null === $user )
        {
            throw $this->createNotFoundException("Vous n'existez pas ?");
        }
        return $this->render('FRONT\account\read.html.twig', [
            'user' => $user
        ]);
    }
    /**
     * @Route("/mon-compte/creation", name="account_add", methods={"GET", "POST"})
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

            $this->addFlash('success', 'Votre compte a bien été enregistré.');

            $mail = (new TemplatedEmail())
                ->from('mypillsbox@gmail.com')
                ->to($user->getEmail())
                ->subject('Bienvenue sur MyPillsBox')
                ->htmlTemplate('mailer/welcome.html.twig')
                ->context([
                    'user' => $user,
                ]);

            $mailer->send($mail);

            return $this->redirectToRoute('home');
        }
        elseif($formUser->isSubmitted() && !$formUser->isValid())
        {
            $this->addFlash('danger', 'Votre compte n\'a pas été enregistré.');
        }

        return $this->render('FRONT/account/add.html.twig', [
            'user'      => $user,
            'formUser'  => $formUser->createView()
        ]);
    }
}