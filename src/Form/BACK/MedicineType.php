<?php

namespace App\Form\BACK;

use App\Entity\BACK\Medicine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MedicineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code_CIS',                           NumberType::class,      ['label' => 'Code CIS du médicament'])
            ->add('name',                               TextType::class,        array('label' => 'Nom du médicament', 'required' => true))
            ->add('medic_compo',                        TextType::class,        array('label' => 'Composition principale du médicament'))
            ->add('medic_type',                         TextareaType::class,    array('label' => 'Type du médicament'))
            ->add('medic_condition',                    TextareaType::class,    array('label' => 'Indications thérapeutiques'))
            ->add('medic_dosage',                       TextareaType::class,    array('label' => 'Posologie recommandée'))
            ->add('medic_exeption',                     TextareaType::class,    array('label' => 'Autres situation cliniques'))
            ->add('medic_method_administration',        TextareaType::class,    array('label' => 'Mode d\'administration'))
            ->add('medic_danger',                       TextareaType::class,    array('label' => 'Contres-indications'))
            ->add('medic_dosage_max',                   TextareaType::class,    array('label' => 'Dose maximale recommandé'))
            ->add('medic_interaction_other_medic',      TextareaType::class,    array('label' => 'Intéractions médicamenteuses'))
            ->add('fertily_pregnancy_breastfeeding',    TextareaType::class,    array('label' => 'Impact sur la fertilité, grossesse et allaitement'))
            ->add('medic_adverse_reaction',             TextareaType::class,    array('label' => 'Effets indésirables'))
            ->add('id_CPD',                             NumberType::class,      array('label' => 'Code CPD du médicament'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicine::class,
        ]);
    }
}
