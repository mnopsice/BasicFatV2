<?php

namespace App\Entity;

use App\Repository\AdherentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentsRepository::class)
 */
class Adherents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=FicheSan::class, inversedBy="adherents", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $num_fiche_sante;


    public function __construct()
    {
        $this->collectives = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFicheSante(): ?FicheSan
    {
        return $this->num_fiche_sante;
    }

    public function setNumFicheSante(FicheSan $num_fiche_sante): self
    {
        $this->num_fiche_sante = $num_fiche_sante;

        return $this;
    }


}
