<?php

namespace App\Entity;

use App\Repository\ExtrasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtrasRepository::class)
 */
class Extras
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="float")
     */
    private $meerprijs;

    /**
     * @ORM\ManyToOne(targetEntity=kamer::class, inversedBy="extras")
     */
    private $kamerId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getMeerprijs(): ?float
    {
        return $this->meerprijs;
    }

    public function setMeerprijs(float $meerprijs): self
    {
        $this->meerprijs = $meerprijs;

        return $this;
    }

    public function getKamerId(): ?kamer
    {
        return $this->kamerId;
    }

    public function setKamerId(?kamer $kamerId): self
    {
        $this->kamerId = $kamerId;

        return $this;
    }
}
