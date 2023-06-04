<?php

namespace App\Entity;

use App\Repository\LibreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibreRepository::class)
 */
class Libre extends Seance
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
    private $nb_activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbActivite(): ?int
    {
        return $this->nb_activite;
    }

    public function setNbActivite(int $nb_activite): self
    {
        $this->nb_activite = $nb_activite;

        return $this;
    }
}
