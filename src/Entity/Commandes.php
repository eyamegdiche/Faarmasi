<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandesRepository::class)
 */
class Commandes
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
    private $mat;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity=Medicaments::class)
     */
    private $Medicaments;

    /**
     * @ORM\ManyToOne(targetEntity=Pharmacies::class, inversedBy="commandes")
     */
    private $Pharmacies;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="commandes")
     */
    private $Clients;

    public function __construct()
    {
        $this->Medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMat(): ?string
    {
        return $this->mat;
    }

    public function setMat(string $mat): self
    {
        $this->mat = $mat;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Medicaments[]
     */
    public function getMedicaments(): Collection
    {
        return $this->Medicaments;
    }

    public function addMedicament(Medicaments $medicament): self
    {
        if (!$this->Medicaments->contains($medicament)) {
            $this->Medicaments[] = $medicament;
        }

        return $this;
    }

    public function removeMedicament(Medicaments $medicament): self
    {
        $this->Medicaments->removeElement($medicament);

        return $this;
    }

    public function getPharmacies(): ?Pharmacies
    {
        return $this->Pharmacies;
    }

    public function setPharmacies(?Pharmacies $Pharmacies): self
    {
        $this->Pharmacies = $Pharmacies;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->Clients;
    }

    public function setClients(?Clients $Clients): self
    {
        $this->Clients = $Clients;

        return $this;
    }
}
