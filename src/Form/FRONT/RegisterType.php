<?php

namespace App\Form\FRONT;

use App\Entity\User;
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
                                'constraints'       => new NotBlank(),
                                'invalid_message'   => "L'adresse email est déjà utilisée",
                                'attr'              => ['class' => 'help is-danger']
        ])
        ->add('password', RepeatedType::class, [
                                'type'              => PasswordType::class,
                                'invalid_message'   => 'Les mots de passe ne correspondent pas',
                                                       'attr' => ['class' => 'help'],
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
                                                        'help'          => 'Un mot de passe sécurisé contient : 10 caratères, des majuscules, minucules, chiffres et des caratères spéciaux.'
                                ],
                                'second_options'    => [
                                                        'label' => 'Confirmez votre Mot de passe',
                                                        'attr'          => [
                                                            'class' => 'input',
                                                        ],
                                ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
