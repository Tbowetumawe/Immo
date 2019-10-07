<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bien", mappedBy="id_type")
     */
    private $idBien;

    public function __construct()
    {
        $this->idBien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getIdBien(): Collection
    {
        return $this->idBien;
    }

    public function addIdBien(Bien $idBien): self
    {
        if (!$this->idBien->contains($idBien)) {
            $this->idBien[] = $idBien;
            $idBien->setIdType($this);
        }

        return $this;
    }

    public function removeIdBien(Bien $idBien): self
    {
        if ($this->idBien->contains($idBien)) {
            $this->idBien->removeElement($idBien);
            // set the owning side to null (unless already changed)
            if ($idBien->getIdType() === $this) {
                $idBien->setIdType(null);
            }
        }

        return $this;
    }
}
