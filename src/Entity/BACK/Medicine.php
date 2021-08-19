<?php

namespace App\Entity\BACK;

use App\Repository\MedicineRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="text")
     */
    private $medic_notice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_compo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $allergen_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medic_type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCIS(): ?int
    {
        return $this->code_CIS;
    }

    public function setCodeCIS(int $code_CIS): self
    {
        $this->code_CIS = $code_CIS;

        return $this;
    }

    public function getMedicNotice(): ?string
    {
        return $this->medic_notice;
    }

    public function setMedicNotice(string $medic_notice): self
    {
        $this->medic_notice = $medic_notice;

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
}
