<?php

namespace App\Entity;

use App\Repository\MedecineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedecineRepository::class)
 */
class Medecine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $allergen_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_type;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_condition;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_dosage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_freq_dosage;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_exeption;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_method_administration;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_danger;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_warning;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_dosage_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $medic_dosage_max_40;

    /**
     * @ORM\Column(type="integer")
     */
    private $medic_dosage_max_50;

    /**
     * @ORM\Column(type="integer")
     */
    private $medic_dosage_max_50_plus;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_usage_precaution;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medic_interaction_other_medic;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $medic_interaction_other_medic_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fertily_pregnancy_breastfeeding;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fertily_pregnancy_breastfeeding_bool;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medic_effect_drive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $medic_effect_drive_bool;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_adverse_reaction;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_overdose;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_overdose_symptom;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_overdose_behavior_overdose;

    /**
     * @ORM\Column(type="text")
     */
    private $prop_pharma_data;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_CPD;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllergenId(): ?int
    {
        return $this->allergen_id;
    }

    public function setAllergenId(?int $allergen_id): self
    {
        $this->allergen_id = $allergen_id;

        return $this;
    }

    public function getMedicType(): ?string
    {
        return $this->medic_type;
    }

    public function setMedicType(string $medic_type): self
    {
        $this->medic_type = $medic_type;

        return $this;
    }

    public function getMedicCondition(): ?string
    {
        return $this->medic_condition;
    }

    public function setMedicCondition(string $medic_condition): self
    {
        $this->medic_condition = $medic_condition;

        return $this;
    }

    public function getMedicDosage(): ?string
    {
        return $this->medic_dosage;
    }

    public function setMedicDosage(string $medic_dosage): self
    {
        $this->medic_dosage = $medic_dosage;

        return $this;
    }

    public function getMedicFreqDosage(): ?string
    {
        return $this->medic_freq_dosage;
    }

    public function setMedicFreqDosage(string $medic_freq_dosage): self
    {
        $this->medic_freq_dosage = $medic_freq_dosage;

        return $this;
    }

    public function getMedicExeption(): ?string
    {
        return $this->medic_exeption;
    }

    public function setMedicExeption(string $medic_exeption): self
    {
        $this->medic_exeption = $medic_exeption;

        return $this;
    }

    public function getMedicMethodAdministration(): ?string
    {
        return $this->medic_method_administration;
    }

    public function setMedicMethodAdministration(string $medic_method_administration): self
    {
        $this->medic_method_administration = $medic_method_administration;

        return $this;
    }

    public function getMedicDanger(): ?string
    {
        return $this->medic_danger;
    }

    public function setMedicDanger(string $medic_danger): self
    {
        $this->medic_danger = $medic_danger;

        return $this;
    }

    public function getMedicWarning(): ?string
    {
        return $this->medic_warning;
    }

    public function setMedicWarning(string $medic_warning): self
    {
        $this->medic_warning = $medic_warning;

        return $this;
    }

    public function getMedicDosageMax(): ?string
    {
        return $this->medic_dosage_max;
    }

    public function setMedicDosageMax(string $medic_dosage_max): self
    {
        $this->medic_dosage_max = $medic_dosage_max;

        return $this;
    }

    public function getMedicDosageMax40(): ?int
    {
        return $this->medic_dosage_max_40;
    }

    public function setMedicDosageMax40(int $medic_dosage_max_40): self
    {
        $this->medic_dosage_max_40 = $medic_dosage_max_40;

        return $this;
    }

    public function getMedicDosageMax50(): ?int
    {
        return $this->medic_dosage_max_50;
    }

    public function setMedicDosageMax50(int $medic_dosage_max_50): self
    {
        $this->medic_dosage_max_50 = $medic_dosage_max_50;

        return $this;
    }

    public function getMedicDosageMax50Plus(): ?int
    {
        return $this->medic_dosage_max_50_plus;
    }

    public function setMedicDosageMax50Plus(int $medic_dosage_max_50_plus): self
    {
        $this->medic_dosage_max_50_plus = $medic_dosage_max_50_plus;

        return $this;
    }

    public function getMedicUsagePrecaution(): ?string
    {
        return $this->medic_usage_precaution;
    }

    public function setMedicUsagePrecaution(string $medic_usage_precaution): self
    {
        $this->medic_usage_precaution = $medic_usage_precaution;

        return $this;
    }

    public function getMedicInteractionOtherMedic(): ?string
    {
        return $this->medic_interaction_other_medic;
    }

    public function setMedicInteractionOtherMedic(?string $medic_interaction_other_medic): self
    {
        $this->medic_interaction_other_medic = $medic_interaction_other_medic;

        return $this;
    }

    public function getMedicInteractionOtherMedicId(): ?int
    {
        return $this->medic_interaction_other_medic_id;
    }

    public function setMedicInteractionOtherMedicId(?int $medic_interaction_other_medic_id): self
    {
        $this->medic_interaction_other_medic_id = $medic_interaction_other_medic_id;

        return $this;
    }

    public function getFertilyPregnancyBreastfeeding(): ?string
    {
        return $this->fertily_pregnancy_breastfeeding;
    }

    public function setFertilyPregnancyBreastfeeding(?string $fertily_pregnancy_breastfeeding): self
    {
        $this->fertily_pregnancy_breastfeeding = $fertily_pregnancy_breastfeeding;

        return $this;
    }

    public function getFertilyPregnancyBreastfeedingBool(): ?bool
    {
        return $this->fertily_pregnancy_breastfeeding_bool;
    }

    public function setFertilyPregnancyBreastfeedingBool(bool $fertily_pregnancy_breastfeeding_bool): self
    {
        $this->fertily_pregnancy_breastfeeding_bool = $fertily_pregnancy_breastfeeding_bool;

        return $this;
    }

    public function getMedicEffectDrive(): ?string
    {
        return $this->medic_effect_drive;
    }

    public function setMedicEffectDrive(?string $medic_effect_drive): self
    {
        $this->medic_effect_drive = $medic_effect_drive;

        return $this;
    }

    public function getMedicEffectDriveBool(): ?bool
    {
        return $this->medic_effect_drive_bool;
    }

    public function setMedicEffectDriveBool(bool $medic_effect_drive_bool): self
    {
        $this->medic_effect_drive_bool = $medic_effect_drive_bool;

        return $this;
    }

    public function getMedicAdverseReaction(): ?string
    {
        return $this->medic_adverse_reaction;
    }

    public function setMedicAdverseReaction(string $medic_adverse_reaction): self
    {
        $this->medic_adverse_reaction = $medic_adverse_reaction;

        return $this;
    }

    public function getMedicOverdose(): ?string
    {
        return $this->medic_overdose;
    }

    public function setMedicOverdose(string $medic_overdose): self
    {
        $this->medic_overdose = $medic_overdose;

        return $this;
    }

    public function getMedicOverdoseSymptom(): ?string
    {
        return $this->medic_overdose_symptom;
    }

    public function setMedicOverdoseSymptom(string $medic_overdose_symptom): self
    {
        $this->medic_overdose_symptom = $medic_overdose_symptom;

        return $this;
    }

    public function getMedicOverdoseBehaviorOverdose(): ?string
    {
        return $this->medic_overdose_behavior_overdose;
    }

    public function setMedicOverdoseBehaviorOverdose(string $medic_overdose_behavior_overdose): self
    {
        $this->medic_overdose_behavior_overdose = $medic_overdose_behavior_overdose;

        return $this;
    }

    public function getPropPharmaData(): ?string
    {
        return $this->prop_pharma_data;
    }

    public function setPropPharmaData(string $prop_pharma_data): self
    {
        $this->prop_pharma_data = $prop_pharma_data;

        return $this;
    }

    public function getIdCPD(): ?int
    {
        return $this->id_CPD;
    }

    public function setIdCPD(?int $id_CPD): self
    {
        $this->id_CPD = $id_CPD;

        return $this;
    }
}
