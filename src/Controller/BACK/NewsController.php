<?php

namespace App\Controller\BACK;

use App\Entity\FRONT\News;
use App\Form\FRONT\NewsType;
use App\Repository\FRONT\NewsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/back-office/news/liste", name="back_office_news_browse")
     */
    public function browse(NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->findAll();

        return $this->render('back/news/browse.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @Route("/back-office/news/voir/{id<\d+>}", name="back_office_news_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function read(News $news = null): Response
    {
        if( null === $news )
        {
            throw $this->createNotFoundException("La news n\'existe pas.");
        }

        return $this->render('back/news/read.html.twig', [
            'news' => $news
        ]);
    }

    /**
     * @Route("/back-office/news/ajout", name="back_office_news_add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $news = new News;
        
        $formNews = $this->createForm(NewsType::class, $news);
        $formNews->handleRequest($request);

        if($formNews->isSubmitted() && $formNews->isValid() )
        {
            $em = $this->getDoctrine()->getManager();

            $em->persist($news);
            $em->flush();

            $this->addFlash('success', "La news a bien été ajoutée.");

            return $this->redirectToRoute('back_office_news_browse');
        }

        elseif($formNews->isSubmitted() && !$formNews->isValid())
        {
            $this->addFlash('danger', "La news n'a pas été enregistrée.");
        }

        return $this->render('back/news/add.html.twig', [
            'formNews' => $formNews->createView()
        ]);
    }

    /**
     * @Route("/back-office/news/edition/{id<\d+>}", name="back_office_news_update", methods={"GET", "POST"}, requirements={"id":"\d+"})
     */
    public function update(News $news = null, Request $request): Response
    {
        if( null === $news)
        {
            throw $this->createNotFoundException("La news n'existe pas.");
        }

        $formNews = $this->createForm(NewsRepository::class, $news);
        $formNews->handleRequest($request);

        if($formNews->isSubmitted() && $formNews->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', "La news a bien été ajoutée.");

            return $this->redirectToRoute('back_office_news_read', [
                'id' => $news->getId()
            ]);
        }

        elseif($formNews->isSubmitted() && !$formNews->isValid())
        {
            $this->addFlash('danger', "La news n'a pas été enregistrée, veuillez vérifier les champs remplis.");
        }

        return $this->render('back/news/update.html.twig', [
            'id'        => $news->getId(),
            'news'      => $news,
            'formNews'  => $formNews
        ]);
    }

    /**
     * @Route("/back-office/medicament/suppression/{id<\d+>}", name="back_office_news_delete", methods={GET"})
     */
    public function delete(News $news): Response
    {
        if( null === $news )
        {
            throw $this->createNotFoundException("La news n'existe pas.");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($news);
        $em->flush();

        $this->addFlash('success', "La news a bien été supprimée.");

        return $this->redirectToRoute('back_office_news_browse', [], 302);
    }
}
