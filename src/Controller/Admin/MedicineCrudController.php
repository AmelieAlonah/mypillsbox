<?php

namespace App\Controller\Admin;

use App\Entity\BACK\Medicine;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class MedicineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medicine::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            NumberField::new('code_CIS', "Le code CIS du médicament")->setHelp("Le code CIS ou Code Identifiant de Spécialité est un code numérique de 8 chiffres qui permet d'identifier un médicament quelle que soit sa présentation (ou encore conditionnement)."),
            TextField::new('name', 'Nom du médicament')->setHelp("Le nom commun du médicament référencé."),
            AssociationField::new('allergens', 'Allergènes/Composition')
                ->autocomplete()
                ->setHelp("Il s'agit de la substance présente dans le médicament qui lui confère ses propriétés thérapeutiques ou préventives."),
            TextField::new('medic_type', 'Type du médicament')->setHelp("La forme pharmaceutique (également appelée 'forme médicamenteuse' ou 'forme galénique') correspond à la forme sous laquelle le médicament se présente (comprimé, gélule, sirop, collyre, crème, solution injectable, etc.). Elle est spécialement conçue pour la voie d'administration à laquelle le médicament est destiné."),
            TextEditorField::new('medic_condition', 'Indications thérapeutiques')->setHelp("L'indication thérapeutique renseigne sur la maladie ou les symptômes que le médicament est capable de traiter ou de prévenir, ou encore sur le diagnostic qu'il permet d'établir."),
            TextEditorField::new('medic_dosage',  'Posologie recommandée')->setHelp("Indication de la dose et du rythme de prise du médicament notamment déterminé selon l'âge, le sexe, le poids et l'état clinique du patient."),
            TextEditorField::new('medic_exeption', 'Autre(s) situation(s) clinique(s)')->setHelp("Les autres situations cliniques sont des situations, dans lesquelles la posologie du médicament est différente qu'initialement."),
            TextEditorField::new('medic_method_administration', 'Mode d\'administration')->setHelp("Le mode d'administration est la voie par laquelle le médicament est pris, avec une recommandation éventuelle."),
            TextEditorField::new('medic_danger', 'Contre-indication(s)')->setHelp("Situation dans laquelle on ne doit pas donner le médicament pour des raisons de sécurité. Cette situation peut survenir dans des circonstances particulières comme un diagnostic clinique particulier, des maladies concomitantes, des facteurs démographiques (le sexe, l'âge) ou des prédispositions particulières (des facteurs par exemple métaboliques ou immunologiques ou des réactions défavorables antérieures à un médicament ou à la classe de médicaments)."),
            TextEditorField::new('medic_dosage_max', 'Dosage maximum recommandé')->setHelp("La dose maximale recommandé, est à titre informatif."),
            TextEditorField::new('medic_interaction_other_medic', 'Associations faisant l\'objet de précautions d\'emploi (intéractions médicamenteuse)')->setHelp("On parle d’interaction médicamenteuse lorsque la prise d’une substance modifie l’effet d’un ou plusieurs autres principes actifs présents au même moment dans l’organisme."),
            TextEditorField::new('fertily_pregnancy_breastfeeding', 'Fertilité, grossesse et allaitement')->setHelp("Les résultats sur l'impact du médicament sur la grossesse, l'allaitement et la fertilité."),
            TextEditorField::new('medic_adverse_reaction', 'Effets indésirables')->setHelp("Un effet indésirable est une réaction nocive et non voulue à un médicament utilisé. Un effet indésirable est dit 'grave' : lorsqu'il entraîne la mort ou est susceptible de mettre la vie en danger du patient ; lorsqu'il entraîne une invalidité ou une incapacité importante ou durable ; lorsqu'il provoque ou prolonge une hospitalisation ; lorsqu'il se manifeste par une anomalie ou une malformation congénitale. Un effet indésirable inattendu (appelé aussi effet secondaire) est un effet indésirable dont la nature, la sévérité ou l'évolution ne correspondent pas aux informations contenues dans le Résumé des caractéristiques du produit."),
            NumberField::new('id_CPD', 'Identifiant du CPD')->setHelp("Les conditions de prescription et de délivrance définissent les modalités d'accès des patients à un médicament. La prescription et/ou la délivrance d'un médicament peuvent en effet être restreintes, c'est-à-dire réservées à l'hôpital ou à certains médecins (certains spécialistes par exemple) ou soumises à certaines conditions (concernant la durée de traitement ou les examens complémentaires à effectuer), dans l'intérêt des patients."),
        ];
    }
    
}
