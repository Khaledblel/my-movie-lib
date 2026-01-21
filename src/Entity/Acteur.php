<?php

namespace App\Entity;

use App\Repository\ActeurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActeurRepository::class)]
class Acteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomActeur = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Salaire = null;

    #[ORM\Column(length: 255)]
    private ?string $Nationalite = null;

    #[ORM\ManyToOne(inversedBy: 'acteurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActeur(): ?string
    {
        return $this->nomActeur;
    }

    public function setNomActeur(string $nomActeur): static
    {
        $this->nomActeur = $nomActeur;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->Salaire;
    }

    public function setSalaire(string $Salaire): static
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->Nationalite;
    }

    public function setNationalite(string $Nationalite): static
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): static
    {
        $this->film = $film;

        return $this;
    }
}
