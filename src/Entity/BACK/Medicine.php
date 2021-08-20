<?php

namespace App\Entity\BACK;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MedicineRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=MedicineRepository::class)
 */
class Medicine
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_CIS;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_compo;

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
     * @ORM\Column(type="text", nullable=true)
     */
    private $medic_interaction_other_medic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fertily_pregnancy_breastfeeding;

    /**
     * @ORM\Column(type="text")
     */
    private $medic_adverse_reaction;

    /**
     * @ORM\Column(nullable=true)
     */
    private $id_CPD;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of code_CIS
     */ 
    public function getCode_CIS()
    {
        return $this->code_CIS;
    }

    /**
     * Set the value of code_CIS
     *
     * @return  self
     */ 
    public function setCode_CIS($code_CIS)
    {
        $this->code_CIS = $code_CIS;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMedicCompo(): ?string
    {
        return $this->medic_compo;
    }

    public function setMedicCompo(string $medic_compo): self
    {
        $this->medic_compo = $medic_compo;

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

    public function getMedicAdverseReaction(): ?string
    {
        return $this->medic_adverse_reaction;
    }

    public function setMedicAdverseReaction(string $medic_adverse_reaction): self
    {
        $this->medic_adverse_reaction = $medic_adverse_reaction;

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