<?php

namespace App\Controller\FRONT;

use App\Form\FRONT\SearchType;
use App\Repository\MedicineRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/recherche", name="medic_research", methods={"GET", "POST"})
     */
    public function searchBar(Request $request, MedicineRepository $medicineRepository): Response
    {
        $formSearch = $this->createForm(SearchType::class);
        $formSearch->handleRequest($request);

        if($formSearch->isSubmitted() && $formSearch->isValid())
        {
            $name = $formSearch->getData()->getName();
            $medicines = $medicineRepository->findMedicinesByName($name);

            return $this->render('FRONT\search\medic_result.html.twig', [
                'medicines' => $medicines
            ]);
        }

        return $this->render('layout/_searchBar.html.twig', [
            'formSearch' => $formSearch->createView()
        ]);
    }

    /**
     * @Route("recherche/resultats", name="medic_result", methods={"GET"})
     */
    public function searchResult(): Response
    {
        return $this->render('FRONT\search\medic_result.html.twig');
    }
}
