<?php

namespace App\Entity;

use App\Repository\ReserveringRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReserveringRepository::class)
 */
class Reservering
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $chechkinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalMethode;

    /**
     * @ORM\ManyToOne(targetEntity=kamer::class, inversedBy="reserverings")
     */
    private $kamerId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChechkinDate(): ?\DateTimeInterface
    {
        return $this->chechkinDate;
    }

    public function setChechkinDate(\DateTimeInterface $chechkinDate): self
    {
        $this->chechkinDate = $chechkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): self
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->betaalMethode;
    }

    public function setBetaalMethode(string $betaalMethode): self
    {
        $this->betaalMethode = $betaalMethode;

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
