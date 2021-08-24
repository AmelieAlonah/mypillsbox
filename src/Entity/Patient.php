<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\Column(type="integer")
     */
    private $allergies;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pregancy;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visually_imparaired;

    /**
     * @ORM\Column(type="boolean")
     */
    private $difficulty_technology;

    /**
     * @ORM\Column(type="boolean")
     */
    private $difficulty_read;

    /**
     * @ORM\Column(type="integer")
     */
    private $role_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAllergies(): ?int
    {
        return $this->allergies;
    }

    public function setAllergies(int $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getPregancy(): ?bool
    {
        return $this->pregancy;
    }

    public function setPregancy(bool $pregancy): self
    {
        $this->pregancy = $pregancy;

        return $this;
    }

    public function getVisuallyImparaired(): ?bool
    {
        return $this->visually_imparaired;
    }

    public function setVisuallyImparaired(bool $visually_imparaired): self
    {
        $this->visually_imparaired = $visually_imparaired;

        return $this;
    }

    public function getDifficultyTechnology(): ?bool
    {
        return $this->difficulty_technology;
    }

    public function setDifficultyTechnology(bool $difficulty_technology): self
    {
        $this->difficulty_technology = $difficulty_technology;

        return $this;
    }

    public function getDifficultyRead(): ?bool
    {
        return $this->difficulty_read;
    }

    public function setDifficultyRead(bool $difficulty_read): self
    {
        $this->difficulty_read = $difficulty_read;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->role_id;
    }

    public function setRoleId(int $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }
}
