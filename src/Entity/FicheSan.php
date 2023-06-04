<?php

namespace App\Entity;

use App\Repository\FicheSanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheSanRepository::class)
 */
class FicheSan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="float")
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $histo_sante;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $histo_seance;

    /**
     * @ORM\OneToOne(targetEntity=Adherents::class, mappedBy="num_fiche_sante", cascade={"persist", "remove"})
     */
    private $adherents;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getHisto_sante(): ?string
    {
        return $this->histo_sante;
    }

    public function setHisto_sante(?string $histo_sante): self
    {
        $this->histo_sante = $histo_sante;

        return $this;
    }

    public function getHisto_seance(): ?string
    {
        return $this->histo_seance;
    }

    public function setHisto_seance(?string $histo_seance): self
    {
        $this->histo_sante = $histo_seance;

        return $this;
    }

    public function getAdherents(): ?Adherents
    {
        return $this->adherents;
    }

    public function setAdherents(Adherents $adherents): self
    {
        // set the owning side of the relation if necessary
        if ($adherents->getNumFicheSante() !== $this) {
            $adherents->setNumFicheSante($this);
        }

        $this->adherents = $adherents;

        return $this;
    }

}
