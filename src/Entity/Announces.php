<?php

namespace App\Entity;

use App\Repository\AnnouncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Users;
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

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;



    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="announce_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Espece::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $espece;

    /**
     * @ORM\ManyToOne(targetEntity=Couleur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $urgent;

   
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

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }



    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEspece(): ?Espece
    {
        return $this->espece;
    }

    public function setEspece(?Espece $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getUrgent(): ?bool
    {
        return $this->urgent;
    }

    public function setUrgent(?bool $urgent): self
    {
        $this->urgent = $urgent;

        return $this;
    }
    public function __toString()
    {
        return $this->nom_caractere;
    }
}