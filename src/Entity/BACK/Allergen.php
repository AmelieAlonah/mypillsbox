<?php

namespace App\Entity\BACK;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Repository\BACK\AllergenRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=AllergenRepository::class)
 */
class Allergen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    
    /**
     * @ORM\ManyToMany(targetEntity=Medicine::class, inversedBy="allergens")
     * @JoinColumn(nullable=true)
     * @ORM\JoinTable(name="allergen_medicine")
     */
    private $medicines;

    public function __construct()
    {
        $this->medicines = new ArrayCollection();
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

    /**
     * @return Collection|Medicine[]
     */
    public function getMedicines(): Collection
    {
        return $this->medicines;
    }

    public function addMedicine(Medicine $medicine): self
    {
        if (!$this->medicines->contains($medicine)) {
            //MAJ Relation
            $medicine->addAllergen($this);

            $this->medicines[] = $medicine;
            
        }

        return $this;
    }

    public function removeMedicine(Medicine $medicine): self
    {
        $this->medicines->removeElement($medicine);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
