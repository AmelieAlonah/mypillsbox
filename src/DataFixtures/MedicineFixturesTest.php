<?php

namespace App\DataFixtures;

use App\Entity\BACK\Medicine;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MedicineFixturesTest extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($index = 1; $index <= 15; $index++)
        {
            $medicine = new Medicine();
            
            $medicine->setCodeCIS(60234100)
                     ->setName("Doliprane 1000 mg comprimé n° $index")
                     ->setMedicCompo("Paracétamol")
                     ->setMedicType("Comprimé")
                     ->setMedicCondition("Traitement symptomatique des douleurs d'intensité légère à modérée et/ou des états fébriles. Traitement symptomatique des douleurs de l’arthrose. Cette présentation est réservée à l'adulte et à l’enfant à partir de 50 kg (soit à partir d’environ 15 ans).")
                     ->setMedicDosage("Attention : cette présentation contient 1000 mg de paracétamol par unité : ne pas prendre 2 unités à la fois. La posologie unitaire usuelle est de un comprimé à 1000 mg par prise, à renouveler au bout de 6 à 8 heures. En cas de besoin, la prise peut être répétée au bout de 4 heures minimum. Il n’est généralement pas nécessaire de dépasser 3 g de paracétamol par jour, soit 3 comprimés par jour. Cependant, en cas de douleurs plus intenses, la posologie maximale peut être augmentée jusqu’à 4 g par jour, soit 4 comprimés par jour. Toujours respecter un intervalle de 4 heures entre les prises")
                     ->setMedicExeption("La dose journalière efficace la plus faible doit être envisagée, sans excéder 60 mg/kg/jour (sans dépasser 3 g/j) dans les situations suivantes :
                     · poids < 50 kg,
                     · insuffisance hépatocellulaire légère à modérée,
                     · alcoolisme chronique,
                     · déshydratation,
                     · réserves basses en glutathion telles que par exemple malnutrition chronique, jeûne, amaigrissement récent, sujet âgé de plus de 75 ans ou de plus de 65 ans et polypathologique, hépatite virale chronique et VIH, mucoviscidose, cholémie familiale (maladie de Gilbert).")
                     ->setMedicMethodAdministration("Voie orale. Les comprimés sont à avaler tels quels avec une boisson (par exemple eau, lait, jus de fruits).")
                     ->setMedicDanger("· Hypersensibilité à la substance active ou à l’un des excipients.
                     · Insuffisance hépatocellulaire sévère.
                     · Enfant de moins de 6 ans en raison des risques de fausse route.")
                     ->setMedicDosageMax("Chez l’enfant de moins de 40 kg, la dose totale de paracétamol ne doit pas dépasser 80 mg/kg/jour.
                     Chez l’enfant de 41 à 50 kg, la dose totale de paracétamol ne doit pas excéder 3 g par jour.
                     Chez l’adulte et l’enfant de plus de 50 kg, LA DOSE TOTALE DE PARACETAMOL NE DOIT PAS EXCEDER 4 GRAMMES PAR JOUR")
                     ->setMedicInteractionOtherMedic("+ Anticoagulants oraux : warfarine et autres antivitamines K (AVK); + Les résines chélatrices; + Flucloxacilline; + Médicaments hépatotoxiques")
                     ->setFertilyPregnancyBreastfeeding("Grossesse :
                     Les études effectuées chez l'animal n'ont pas mis en évidence d'effet tératogène ou fœtotoxique du paracétamol.
                     Une vaste quantité de données portant sur les femmes enceintes démontrent l’absence de toute malformation ou de toute toxicité fœtale/néonatale. Les études épidémiologiques consacrées au neurodéveloppement des enfants exposés au paracétamol in utero produisent des résultats non concluants.
                     Si cela s’avère nécessaire d’un point de vue clinique, le paracétamol peut être utilisé pendant la grossesse ; cependant, il devra être utilisé à la dose efficace la plus faible, pendant la durée la plus courte possible et à la fréquence la plus réduite possible.
                     
                     Allaitement :
                     A doses thérapeutiques, l'administration de ce médicament est possible pendant l'allaitement.
                     
                     Fertilité :
                     En raison du mécanisme d’action potentiel sur les cyclo-oxygénase et la synthèse de prostaglandines, le paracétamol pourrait altérer la fertilité chez la femme, par un effet sur l’ovulation réversible à l’arrêt du traitement.
                     Des effets sur la fertilité des mâles ont été observés dans une étude chez l'animal. La pertinence de ces effets chez l'homme n'est pas connue.")
                     ->setMedicAdverseReaction("Affections du système immunitaire :

                     Rare : réactions d’hypersensibilité à type de choc anaphylactique, œdème de Quincke. Leur survenue impose l’arrêt définitif de ce médicament et des médicaments apparentés.
                     
                     Affections de la peau et des tissus sous-cutanés :
                     
                     Rare : érythème, urticaire, rash cutané ont été rapportés. Leur survenue impose l’arrêt définitif de ce médicament et des médicaments apparentés.
                     De très rares cas d’effets indésirables cutanés graves ont été rapportés.
                     Fréquence indéterminée : érythème pigmenté fixe.
                     
                     Affections hématologiques et du système lymphatique :
                     
                     Très exceptionnels : thrombopénie, leucopénie et neutropénie.
                     Fréquence indéterminée : agranulocytose, anémie hémolytique chez les patients présentant un déficit en glucose‑6‑phosphate‑déshydrogénase.
                     
                     Affections hépatobiliaires :
                     
                     Fréquence indéterminée : augmentation des transaminases, atteinte hépatique cytolytique, hépatite aiguë, hépatite massive en particulier lors d’une utilisation dans une situation à risque (voir rubrique 4.4 Précautions d’emploi).
                     
                     Affections cardiaques :
                     Fréquence indéterminée : syndrome de Kounis.
                     
                     Affections respiratoires, thoraciques et médiastinales :
                     Fréquence indéterminée : bronchospasme")
                     ->setIdCPD("1");

                     $manager->persist($medicine);
        }

        $manager->flush();
    }
}
