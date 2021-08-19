<?php

namespace App\Controller\BACK;

use phpDocumentor\Reflection\Types\Void_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicController extends AbstractController
{
    /**
     * @Route("/back-office/medicament", name="back_office_medic_browse", methods="GET")
     */
    public function MedicBrowse(): Response
    {
        return $this->render('back/medic/browse.html.twig');
    }

    /**
     * @Route("/back-office/medicament/{id}", name="back_office_medic_read", methods="GET")
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
        return $this->render('back/medic/index.html.twig');
    }

    /**
     * @Route("/back-office/medicament/edition", name="back_office_medic_update", methods={"GET", "POST"})
     */
    public function MedicUpdate(): Response
    {
        return $this->render('back/medic/index.html.twig');
    }

    /**
     * @Route("/back-office/medicament/supression/{id}", name="back_office_medic_update", methods={"DELETE"})
     */
    public function MedicDelete(): Void
    {
        
    }
}
