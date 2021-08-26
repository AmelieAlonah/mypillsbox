<?php

namespace App\Controller\FRONT;

use App\Repository\FRONT\NewsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news_browse")
     */
    public function browse(NewsRepository $newsRepository, Request $request, PaginatorInterface $paginatorInterface): Response
    {
        $news = $newsRepository->findAll();

        $news = $paginatorInterface->paginate(
            $news,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('FRONT/news/browse.html.twig', [
            'news' => $news
        ]);
    }
}
