<?php

namespace App\Entity;

use App\Repository\PharmaciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PharmaciesRepository::class)
 */
class Pharmacies
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity=Medicaments::class)
     */
    private $Medicaments;

    /**
     * @ORM\ManyToMany(targetEntity=Fournisseurs::class, inversedBy="pharmacies")
     */
    private $Fournisseurs;

    /**
     * @ORM\OneToMany(targetEntity=Commandes::class, mappedBy="Pharmacies")
     */
    private $commandes;

    public function __construct()
    {
        $this->Medicaments = new ArrayCollection();
        $this->Fournisseurs = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    /**
     * @return Collection|Fournisseurs[]
     */
    public function getFournisseurs(): Collection
    {
        return $this->Fournisseurs;
    }

    public function addFournisseur(Fournisseurs $fournisseur): self
    {
        if (!$this->Fournisseurs->contains($fournisseur)) {
            $this->Fournisseurs[] = $fournisseur;
        }

        return $this;
    }

    public function removeFournisseur(Fournisseurs $fournisseur): self
    {
        $this->Fournisseurs->removeElement($fournisseur);

        return $this;
    }

    /**
     * @return Collection|Commandes[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setPharmacies($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getPharmacies() === $this) {
                $commande->setPharmacies(null);
            }
        }

        return $this;
    }


    public function __toString() 
    {
        return (string) $this->nom; 
    }
    
}
