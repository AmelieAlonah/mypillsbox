<?php

namespace App\Controller\BACK;

use App\Entity\BACK\Medicine;
use App\Form\BACK\MedicineType;
use App\Repository\MedicineRepository;
use App\Service\MessageGenerator;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Void_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedicController extends AbstractController
{

    /**
     * @Route("/back-office/medicament/liste", name="back_office_medic_browse", methods={"GET"})
     */
    public function MedicBrowse(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Medicine::class);

        $medics     = $repository->findAll();
        
        return $this->render('back/medic/browse.html.twig', [
            'medics' => $medics
        ]);
    }

    /**
     * @Route("/back-office/medicament/voir/{id<\d+>}", name="back_office_medic_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function MedicRead(Medicine $medicine = null): Response
    {
        if ( null === $medicine)
        {
            throw $this->createNotFoundException("Le medicament n'existe pas");
        }

        return $this->render('back/medic/read.html.twig', [
            'medicine' => $medicine
        ]);
    }

    /**
     * @Route("/back-office/medicament/ajout", name="back_office_medic_add", methods={"GET", "POST"})
     */
    public function MedicAdd(Request $request): Response
    {
        $medicine = new Medicine;

        $formMedicine = $this->createForm(MedicineType::class, $medicine);
        $formMedicine->handleRequest($request);

        if($formMedicine->isSubmitted() && $formMedicine->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medicine);
            $em->flush();

            $this->addFlash('success', 'Le médicament a bien été enregistré dans la base de donnée.');
        }
        
        elseif($formMedicine->isSubmitted() && !$formMedicine->isValid())
        {
            $this->addFlash('danger', 'Le médicament n\'a pas été enregistré dans la base de donnée.');
        }

        return $this->render('back/medic/add.html.twig', [
            'formMedicine' => $formMedicine->createView()
        ]);
    }

    /**
     * @Route("/back-office/medicament/edition/{id<\d+>}", name="back_office_medic_update", methods={"GET", "POST"}, requirements={"id":"\d+"})
     */
    public function MedicUpdate(Medicine $medicine = null, Request $request): Response
    {
        if ( null === $medicine)
        {
            throw $this->createNotFoundException("Le medicament n'existe pas");
        }

        $formMedicine = $this->createForm(MedicineType::class, $medicine);
        $formMedicine->handleRequest($request);

        if($formMedicine->isSubmitted() && $formMedicine->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'Le médicament a bien été mis à jour dans la base de donnée.');

            return $this->redirectToRoute('back_office_medic_read', ['id' => $medicine->getId()]);
        }
        else
        {
            $this->addFlash('danger', 'Le médicament n\'a pas été mis à jour, veuillez vérifier les champs remplis.');
        }

        return $this->render('back/medic/update.html.twig', [
            'id' => $medicine->getId(),
            'medicine' => $medicine,
            'formMedicine' => $formMedicine->createView()
        ]);
    }

    /**
     * @Route("/back-office/medicament/suppression/{id<\d+>}", name="back_office_medic_delete", methods={"GET"})
     */
    public function MedicDelete(EntityManagerInterface $entityManagerInterface, Medicine $medicine = null): Response
    {
        if ( null === $medicine)
        {
            throw $this->createNotFoundException("Le medicament n'existe pas");
        }

        $entityManagerInterface = $this->getDoctrine()->getManager();
        $entityManagerInterface->remove($medicine);
        $entityManagerInterface->flush();

        $this->addFlash('success', 'Le médicament a bien été supprimé de la base de donnée.');

        return $this->redirectToRoute('back_office_medic_browse', [], 302);
    }
    
}
