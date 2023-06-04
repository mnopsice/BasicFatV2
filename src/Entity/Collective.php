<?php

namespace App\Entity;

use App\Repository\CollectiveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollectiveRepository::class)
 */
class Collective extends Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_places;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_personnes;

    /**
     * @ORM\ManyToOne(targetEntity=Coachs::class, inversedBy="collectives")
     */
    private $coachs;

    /**
     * @ORM\ManyToMany(targetEntity=Adherents::class, inversedBy="collectives")
     */
    private $adherents;

    public function __construct()
    {
        $this->adherents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nb_places;
    }

    public function setNbPlaces(int $nb_places): self
    {
        $this->nb_places = $nb_places;

        return $this;
    }

    public function getNbPersonnes(): ?int
    {
        return $this->nb_personnes;
    }

    public function setNbPersonnes(int $nb_personnes): self
    {
        $this->nb_personnes = $nb_personnes;

        return $this;
    }

    public function getCoachs(): ?Coachs
    {
        return $this->coachs;
    }

    public function setCoachs(?Coachs $coachs): self
    {
        $this->coachs = $coachs;

        return $this;
    }

    /**
     * @return Collection<int, Adherents>
     */
    public function getAdherents(): Collection
    {
        return $this->adherents;
    }

    public function addAdherent(Adherents $adherent): self
    {
        if (!$this->adherents->contains($adherent)) {
            $this->adherents[] = $adherent;
        }

        return $this;
    }

    public function removeAdherent(Adherents $adherent): self
    {
        $this->adherents->removeElement($adherent);

        return $this;
    }
}
