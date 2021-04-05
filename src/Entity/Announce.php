<?php

namespace App\Entity;

use App\Repository\AnnounceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnounceRepository::class)
 */
class Announce
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
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
    private $caracteres;

    /**
     * @ORM\ManyToMany(targetEntity=conditionsVie::class)
     */
    private $lieu_de_vie;

    public function __construct()
    {
        $this->caracteres = new ArrayCollection();
        $this->lieu_de_vie = new ArrayCollection();
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
     * @return Collection|Caractere[]
     */
    public function getCaractere(): Collection
    {
        return $this->caracteres;
    }

    public function addCaractere(Caractere $caractere): self
    {
        if (!$this->caracteres->contains($caractere)) {
            $this->caracteres[] = $caractere;
        }

        return $this;
    }

    public function removeCaractere(Caractere $caractere): self
    {
        $this->caracteres->removeElement($caractere);

        return $this;
    }

    /**
     * @return Collection|LieuxDeVie[]
     */
    public function getLieuDeVie(): Collection
    {
        return $this->lieu_de_vie;
    }

    public function addLieuDeVie(LieuxDeVie $lieuDeVie): self
    {
        if (!$this->lieu_de_vie->contains($lieuDeVie)) {
            $this->lieu_de_vie[] = $lieuDeVie;
        }

        return $this;
    }

    public function removeLieuDeVie(LieuxDeVie $lieuDeVie): self
    {
        $this->lieu_de_vie->removeElement($lieuDeVie);

        return $this;
    }
}
