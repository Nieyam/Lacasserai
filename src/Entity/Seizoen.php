<?php

namespace App\Entity;

use App\Repository\SeizoenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeizoenRepository::class)
 */
class Seizoen
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
     * @ORM\Column(type="date")
     */
    private $beginDatum;

    /**
     * @ORM\Column(type="date")
     */
    private $eindDatum;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $korting;

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

    public function getBeginDatum(): ?\DateTimeInterface
    {
        return $this->beginDatum;
    }

    public function setBeginDatum(\DateTimeInterface $beginDatum): self
    {
        $this->beginDatum = $beginDatum;

        return $this;
    }

    public function getEindDatum(): ?\DateTimeInterface
    {
        return $this->eindDatum;
    }

    public function setEindDatum(\DateTimeInterface $eindDatum): self
    {
        $this->eindDatum = $eindDatum;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->korting;
    }

    public function setKorting(?string $korting): self
    {
        $this->korting = $korting;

        return $this;
    }
}
