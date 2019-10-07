<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bien", inversedBy="visites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idBien;

    /**
     * @ORM\Column(type="date")
     */
    private $id_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visiteur", inversedBy="visites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_visiteur;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $suite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBien(): ?Bien
    {
        return $this->idBien;
    }

    public function setIdBien(?Bien $idBien): self
    {
        $this->idBien = $idBien;

        return $this;
    }

    public function getIdDate(): ?\DateTimeInterface
    {
        return $this->id_date;
    }

    public function setIdDate(\DateTimeInterface $id_date): self
    {
        $this->id_date = $id_date;

        return $this;
    }

    public function getIdVisiteur(): ?Visiteur
    {
        return $this->id_visiteur;
    }

    public function setIdVisiteur(?Visiteur $id_visiteur): self
    {
        $this->id_visiteur = $id_visiteur;

        return $this;
    }

    public function getSuite(): ?string
    {
        return $this->suite;
    }

    public function setSuite(string $suite): self
    {
        $this->suite = $suite;

        return $this;
    }
}
