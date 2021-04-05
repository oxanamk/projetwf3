<?php

namespace App\Entity;

use App\Repository\CaractereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaractereRepository::class)
 */
class Caractere
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
    private $nom_caractere;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCaractere(): ?string
    {
        return $this->nom_caractere;
    }

    public function setNomCaractere(string $nom_caractere): self
    {
        $this->nom_caractere = $nom_caractere;

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
}
