<?php

namespace App\Controller\Admin;

use App\Entity\BACK\User;
use Symfony\Component\Validator\Constraints\Regex;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Validator\Constraints\NotBlank;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Adresse email')
                ->setFormTypeOptions([
                    'constraints' => [
                        new NotBlank()
                    ],
                    'required' => true,
                ]),
            TextField::new('password', 'Mot de passe')
                ->hideWhenUpdating()
                ->setFormType(RepeatedType::class)
                ->setFormTypeOptions([
                    'type' => PasswordType::class,
                    'invalid_message'   => 'Les mots de passe ne correspondent pas',
                    'mapped'            => false,
                    
                    'required' => true,
                    'first_options'    => [
                        'label' => 'Votre Mot de passe',
                        'constraints' => [
                        new Regex('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-\/])[A-Za-z\d@$!%*#?&-\/]{10,}$/'),
                        new NotCompromisedPassword()
                    ],
                    ],
                    'second_options'    => [
                        'label' => 'Confirmez votre Mot de passe',
                    ]
                ])
                ->setLabel("Votre Mot de passe")
                ->setHelp("Un mot de passe sécurisé contient : 10 caratères, des majuscules, minucules, chiffres et des caratères spéciaux."),
                
            ChoiceField::new('roles', 'Roles')
                ->allowMultipleChoices()
                ->setChoices([
                "Utilisateur" => "ROLE_USER", 
                "Administrateur" => "ROLE_ADMIN"]),
        ];
    }
    
}
