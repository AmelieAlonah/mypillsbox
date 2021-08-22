<?php

namespace App\Form\BACK;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class)
            ->add('password', RepeatedType::class, [
                                    'type'              => PasswordType::class,
                                    'invalid_message'   => 'Les mots de passe ne correspondent pas',
                                    'mapped'            => false,
                                    'first_options'     => [
                                                            'constraints'    => [
                                                                            new Regex('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&-\/])[A-Za-z\d@$!%*#?&-\/]{8,}$/'),
                                                                            new NotCompromisedPassword(),
                                                            ],
                                                            'attr'          => [
                                                                                'placeholder' => 'Laissez vide si inchangé',
                                                            ],
                                                            'label' => 'Votre Mot de passe',
                                                            'help'          => 'Un mot de passe sécurisé contient : 10 caratères, des majuscules, minucules, chiffres et des caratères spéciaux.'
                                    ],
                                    'second_options'    => ['label' => 'Confirmez votre Mot de passe'],
                    ])
            ->add('roles', ChoiceType::class, [
                        'choices' => [
                            'Utilisateur' => 'ROLE_USER',
                            'Administrateur' => 'ROLE_ADMIN'
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
