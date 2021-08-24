<?php

namespace App\Entity\BACK;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BACK\MedicineRepository;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="integer", nullable=false)
     */
    private $code_CIS;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $medic_type;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_condition;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_dosage;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_exeption;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_method_administration;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_danger;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $medic_dosage_max;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $medic_interaction_other_medic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fertily_pregnancy_breastfeeding;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $medic_adverse_reaction;

    /**
     * @ORM\Column(nullable=true)
     */
    private $id_CPD;
    
    //mapped de base ms marche pas
    /**
     * @ORM\ManyToMany(targetEntity=Allergen::class, inversedBy="medicines")
     * @ORM\JoinTable(name="allergen_medicine")
     */
    private $allergens;


    public function __construct()
    {
        $this->allergens = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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


    /**
     * Get the value of code_CIS
     */ 
    public function getCodeCIS()
    {
        return $this->code_CIS;
    }

    /**
     * Set the value of code_CIS
     *
     * @return  self
     */ 
    public function setCodeCIS($code_CIS)
    {
        $this->code_CIS = $code_CIS;

        return $this;
    }

    /**
     * @return Collection|Allergen[]
     */
    public function getAllergens(): Collection
    {
        return $this->allergens;
    }

    public function addAllergen(Allergen $allergen): self
    {
        if (!$this->allergens->contains($allergen)) {
            $this->allergens[] = $allergen;
            $allergen->addMedicine($this);
        }

        return $this;
    }

    public function removeAllergen(Allergen $allergen): self
    {
        if ($this->allergens->removeElement($allergen)) {
            $allergen->removeMedicine($this);
        }

        return $this;
    }

}