<?php

namespace App\Controller\Admin;

use App\Entity\FRONT\News;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre')->setHelp("Titre de la nouvelle."),
            TextEditorField::new('content', 'Contenus')->setHelp("Contenus de la nouvelle"),
        ];
    }
    
}
