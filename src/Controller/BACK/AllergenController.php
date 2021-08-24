<?php

namespace App\Controller\BACK;

use App\Entity\BACK\Allergen;
use App\Form\BACK\AllergenType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllergenController extends AbstractController
{
    /**
     * @Route("/back-office/allergene/liste", name="back_office_allergen_browse")
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
     * @Route("/back-office/allergene/voir/{id<\d+>}", name="back_office_allergen_read", methods={"GET"}, requirements={"id":"\d+"})
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

    /**
     * @Route("/back-office/allergene/ajout", name="back_office_allergen_add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $allergen = new Allergen();

        $formAllergen = $this->createForm(AllergenType::class, $allergen);
        $formAllergen->handleRequest($request);

        if($formAllergen->isSubmitted() && $formAllergen->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($allergen);
            $em->flush();

            $this->addFlash('success', 'L\'allergène a bien été enregistré dans la base de donnée.');
        }
        
        elseif($formAllergen->isSubmitted() && !$formAllergen->isValid())
        {
            $this->addFlash('danger', 'L\'allergène n\'a pas été enregistré dans la base de donnée.');
        }

        return $this->render('back/allergen/add.html.twig', [
            'formAllergen' => $formAllergen->createView()
        ]);
    }

    /**
     * @Route("/back-office/allergene/edition/{id<\d+>}", name="back_office_allergen_update", methods={"GET", "POST"}, requirements={"id":"\d+"})
     */
    public function update(Allergen $allergen = null, Request $request): Response
    {
        if( null === $allergen)
        {
            throw $this->createNotFoundException("L'allergène n'existe pas.");
        }

        $formAllergen = $this->createForm(AllergenType::class, $allergen);
        $formAllergen->handleRequest($request);

        if($formAllergen->isSubmitted() && $formAllergen->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success', 'L\'allergène a bien été modifié dans la base de donnée.');

            return $this->redirectToRoute('back_office_allergen_read', ['id' => $allergen->getId()]);
        }

        elseif($formAllergen->isSubmitted() && !$formAllergen->isValid())
        {
            $this->addFlash('danger', 'L\'allergène n\'a pas été modifié dans la base de donnée, veuillez vérifier les champs remplis.');
        }

        return $this->render('back/allergen/update.html.twig', [
            'id'            => $allergen->getId(),
            'allergen'      => $allergen,
            'formAllergen'  => $formAllergen->createView()
        ]);
    }

    /**
     * @Route("/back-office/allergene/suppression/{id<\d+>}", name="back_office_allergen_delete", methods={"GET"})
     */
    public function delete(Allergen $allergen = null): Response
    {
        if( null === $allergen )
        {
            throw $this->createNotFoundException("L'allergène n'existe pas.");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($allergen);
        $em->flush();

        $this->addFlash('success', "L'allergène abien été supprimé de la base de données.");

        return $this->redirectToRoute('back_office_allergen_browse', [], 302);
    }
}
