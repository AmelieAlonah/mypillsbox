<?php

namespace App\Controller\BACK;

use App\Entity\BACK\Allergen;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllergenController extends AbstractController
{
    /**
     * @Route("/back-office/allergenes/liste", name="back_office_allergen_browse")
     */
    public function browse(Request $request, PaginatorInterface $paginator): Response
    {
        $repository = $this->getDoctrine()->getRepository(Allergen::class);
        $allergens  = $repository->findAll();

        $allergens = $paginator->paginate(
            $allergens, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('back/allergen/browse.html.twig', [
            'allergens' => $allergens
        ]);
    }

    /**
     * @Route("/back-office/allergenes/voir/{id<\d+>}", name="back_office_allergen_read", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function read(Allergen $allergen = null): Response 
    {
        if( null === $allergen)
        {
            throw $this->createNotFoundException("L'allergène n'est pas trouvé.");
        }

        return $this->render('back/allergen/read.html.twig', [
            'allergen' => $allergen
        ]);
    }
}
