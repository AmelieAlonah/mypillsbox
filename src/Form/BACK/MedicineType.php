<?php

namespace App\Form\BACK;

use App\Entity\BACK\Medicine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code_CIS',                           NumberType::class,  array('label' => 'Code CIS du médicament'))
            ->add('name',                               TextType::class,    array('label' => 'Nom du médicament'))
            ->add('medic_compo',                        TextType::class,    array('label' => 'Composition principale du médicament'))
            ->add('medic_type',                         TextType::class,    array('label' => 'Type du médicament'))
            ->add('medic_condition',                    TextType::class,    array('label' => 'Indications thérapeutiques'))
            ->add('medic_dosage',                       TextType::class,    array('label' => 'Posologie recommandée'))
            ->add('medic_exeption',                     TextType::class,    array('label' => 'Autres situation cliniques'))
            ->add('medic_method_administration',        TextType::class,    array('label' => 'Mode d\'administration'))
            ->add('medic_danger',                       TextType::class,    array('label' => 'Contres-indications'))
            ->add('medic_dosage_max',                   TextType::class,    array('label' => 'Dose maximale recommandé'))
            ->add('medic_dosage_max_40',                NumberType::class,  array('label' => 'Dose maximale recommandée pour une personne de moins de 40kg'))
            ->add('medic_dosage_max_50',                NumberType::class,  array('label' => 'Dose maximale recommandée pour une personne de moins de 50kg'))
            ->add('medic_dosage_max_50_plus',           NumberType::class,  array('label' => 'Dose maximale recommandée pour une personne de plus de 50kg'))
            ->add('medic_interaction_other_medic',      TextType::class,    array('label' => 'Intéractions médicamenteuses'))
            ->add('fertily_pregnancy_breastfeeding',    TextType::class,    array('label' => 'Impact sur la fertilité, grossesse et allaitement'))
            ->add('medic_adverse_reaction',             TextType::class,    array('label' => 'Effets indésirables'))
            ->add('id_CPD',                             NumberType::class,  array('label' => 'Code CPD du médicament'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicine::class,
        ]);
    }
}
