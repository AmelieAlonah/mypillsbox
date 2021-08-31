<?php

namespace App\Form\FRONT;

use App\Entity\FRONT\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('email', TextType::class, [
                'constraints' => new NotBlank(),
                'invalid_message'   => "L'adresse email n'est pas valide.",
                'attr'              => ['class' => 'help is-danger']
            ])
            ->add('subject', ChoiceType::class, [
                'choices' => [
                    'Le site'   => 'Le_site',
                    'Mon CV'    => 'Mon_CV',
                    'Autre'     => 'Autre'
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('content', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
