<?php

namespace App\Entity;

use App\Repository\AnnouncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnouncesRepository::class)
 */
class Announces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Caracteres::class)
     */
    private $qualites;

    /**
     * @ORM\ManyToMany(targetEntity=ConditionsVie::class)
     */
    private $conditions_de_vie;

    public function __construct()
    {
        $this->qualites = new ArrayCollection();
        $this->conditions_de_vie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Caracteres[]
     */
    public function getQualites(): Collection
    {
        return $this->qualites;
    }

    public function addQualite(Caracteres $qualite): self
    {
        if (!$this->qualites->contains($qualite)) {
            $this->qualites[] = $qualite;
        }

        return $this;
    }

    public function removeQualite(Caracteres $qualite): self
    {
        $this->qualites->removeElement($qualite);

        return $this;
    }

    /**
     * @return Collection|ConditionsVie[]
     */
    public function getConditionsDeVie(): Collection
    {
        return $this->conditions_de_vie;
    }

    public function addConditionsDeVie(ConditionsVie $conditionsDeVie): self
    {
        if (!$this->conditions_de_vie->contains($conditionsDeVie)) {
            $this->conditions_de_vie[] = $conditionsDeVie;
        }

        return $this;
    }

    public function removeConditionsDeVie(ConditionsVie $conditionsDeVie): self
    {
        $this->conditions_de_vie->removeElement($conditionsDeVie);

        return $this;
    }
}
