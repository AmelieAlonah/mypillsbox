<?php

namespace App\Controller\FRONT;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use App\Form\FRONT\SearchType;
use App\Repository\BACK\AllergenRepository;
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
    public function searchBar(Request $request, MedicineRepository $medicineRepository, AllergenRepository $allergenRepository): Response
    {
        $formSearch = $this->createForm(SearchType::class);
        $formSearch->handleRequest($request);

        if($formSearch->isSubmitted() && $formSearch->isValid())
        {
            $name = $formSearch->getData()->getName();

            $medicines = $medicineRepository->findMedicinesByName($name);
            $allergens = $allergenRepository->findAllergensByName($name);
            
            $this->addFlash('success', "Votre recherche s'est bien passée");

            return $this->render('FRONT\search\medic_result.html.twig', [
                'medicines' => $medicines,
                'allergens' => $allergens
            ]);

            
        }

        if($formSearch->isSubmitted() && !$formSearch->isValid())
        {
            return $this->addFlash('danger', "Votre recherche n'est pas valide.");
        }

            return $this->render('layout/_searchBar.html.twig', [
            'formSearch' => $formSearch->createView()
            ]);
        
    }

    /**
     * @Route("/recherche/medicament/voir/{id<\d+>}", name="medic_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function searchMedicineRead(Medicine $medicine = null): Response
    {
        if ( null === $medicine)
        {
            throw $this->createNotFoundException("Le medicament n'existe pas");
        }

        return $this->render('FRONT\medicine\medic_read.html.twig', [
            'medicine' => $medicine
        ]);
    }

    /**
     * @Route("/recherche/allergene/voir/{id<\d+>}", name="allergen_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function searchAllergenRead(Allergen $allergen = null): Response
    {
        if ( null === $allergen)
        {
            throw $this->createNotFoundException("L'allergène n'existe pas");
        }

        return $this->render('FRONT\allergen\allergen_read.html.twig', [
            'allergen' => $allergen
        ]);
    }
}
