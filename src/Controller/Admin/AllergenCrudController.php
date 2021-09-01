<?php

namespace App\Controller\Admin;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AllergenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allergen::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', "Nom de l'allergène"),
            AssociationField::new('medicines', "Médicaments")->autocomplete(),
        ];
    }
    
}
