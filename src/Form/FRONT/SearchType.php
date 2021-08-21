<?php

namespace App\Form\FRONT;

use App\Entity\BACK\Medicine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', TextType::class, [
                        'label' => false,
                        'attr' => [
                        'class' => 'form-control',
                        'placeholder' => 'Entrez un mot-clé'
                        ]
                ])
                ->add('recherche', SubmitType::class, [
                        'attr' => [
                        'class' => 'btn btn-primary'
                        ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicine::class,
        ]);
    }
}
