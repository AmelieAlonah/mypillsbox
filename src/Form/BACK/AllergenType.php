<?php

namespace App\Form\BACK;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use Symfony\Component\Form\AbstractType;
use App\Repository\BACK\MedicineRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AllergenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',           TextType::class,    ['label' => "Nom de l'allergene"])
            ->add('medicines',      EntityType::class,  ['class'        => Medicine::class,
                                                        'choice_label'  => 'name',
                                                        'multiple'      => true,
                                                        'expanded'      => true,
                                                        'query_builder' => function (MedicineRepository $medicineRepository)
                                                                            {
                                                                                return $medicineRepository->createQueryBuilder('m')
                                                                                                          ->orderBy('m.name', 'ASC');
                                                                            },
                                                        'label'         => 'Nom du médicament']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Allergen::class,
        ]);
    }
}
