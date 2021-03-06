<?php

namespace App\Form\BACK;

use App\Entity\BACK\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                                    'constraints' => new NotBlank(),
            ])
            ->add('password', RepeatedType::class, [
                                    'type'              => PasswordType::class,
                                    'invalid_message'   => 'Les mots de passe ne correspondent pas',
                                    'mapped'            => false,
                                    'first_options'     => [
                                                            'constraints'    => [
                                                                            new NotBlank(),
                                                                            new Regex('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-\/])[A-Za-z\d@$!%*#?&-\/]{10,}$/'),
                                                                            new NotCompromisedPassword(),
                                                            ],
                                                            'attr'          => [
                                                                                'class' => 'input',
                                                            ],
                                                            'required' => true,
                                                            'label' => 'Votre Mot de passe',
                                                            'help'          => 'Un mot de passe s??curis?? contient : 10 carat??res, des majuscules, minucules, chiffres et des carat??res sp??ciaux.'
                                    ],
                                    'second_options'    => [
                                                            'label' => 'Confirmez votre Mot de passe',
                                                            'attr'          => [
                                                                'class' => 'input',
                                                            ],
                                    ],
                    ])
            ->add('roles', ChoiceType::class, [
                        'choices' => [
                            'Utilisateur' => 'ROLE_USER',
                            'Administrateur' => 'ROLE_ADMIN',
                            'Super Admin' => 'ROLE_SUPER_ADMIN'
                        ],
                        'multiple' => true,
                        'expanded' => true,
                    ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
