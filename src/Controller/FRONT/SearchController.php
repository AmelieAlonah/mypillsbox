<?php

namespace App\Controller\FRONT;

use App\Entity\BACK\Medicine;
use App\Form\FRONT\SearchType;
use App\Repository\BACK\MedicineRepository;
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
     * @Route("/recherche/voir/{id<\d+>}", name="medic_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function searchRead(Medicine $medicine = null): Response
    {
        if ( null === $medicine)
        {
            throw $this->createNotFoundException("Le medicament n'existe pas");
        }

        return $this->render('FRONT\medicine\medic_read.html.twig', [
            'medicine' => $medicine
        ]);
    }
}
