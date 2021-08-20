<?php

namespace App\Controller\BACK;

use phpDocumentor\Reflection\Types\Void_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicController extends AbstractController
{

    /**
     * @Route("/back-office/medicament/liste", name="back_office_medic_browse", methods={"GET"})
     */
    public function MedicBrowse(): Response
    {
        
        return $this->render('back/medic/browse.html.twig');
    }

    /**
     * @Route("/back-office/medicament/voir/{id<\d+>}", name="back_office_medic_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function MedicRead(): Response
    {
        return $this->render('back/medic/read.html.twig');
    }

    /**
     * @Route("/back-office/medicament/ajout", name="back_office_medic_add", methods={"GET", "POST"})
     */
    public function MedicAdd(): Response
    {
        return $this->render('back/medic/add.html.twig');
    }

    /**
     * @Route("/back-office/medicament/edition/{id<\d+>}", name="back_office_medic_update", methods={"GET", "POST"})
     */
    public function MedicUpdate(): Response
    {
        return $this->render('back/medic/update.html.twig');
    }

    /**
     * @Route("/back-office/medicament/suppression/{id<\d+>}", name="back_office_medic_delete", methods={"DELETE"})
     */
    public function MedicDelete(): Response
    {
        return $this->json("OK", Response::HTTP_ACCEPTED, [], []);
    }
    
}
