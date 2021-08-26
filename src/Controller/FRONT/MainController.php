<?php

namespace App\Controller\FRONT;

use App\Repository\FRONT\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function home(NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->lastNews();

        return $this->render('FRONT/home.html.twig', [
            'news' => $news
        ]);
    }
}
