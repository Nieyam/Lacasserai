<?php

namespace App\Entity;

use App\Repository\BetaalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetaalRepository::class)
 */
class Betaal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rekeningnummer;

    /**
     * @ORM\Column(type="date")
     */
    private $betaalDate;

    /**
     * @ORM\Column(type="float")
     */
    private $betaalId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getRekeningnummer(): ?string
    {
        return $this->rekeningnummer;
    }

    public function setRekeningnummer(string $rekeningnummer): self
    {
        $this->rekeningnummer = $rekeningnummer;

        return $this;
    }

    public function getBetaalDate(): ?\DateTimeInterface
    {
        return $this->betaalDate;
    }

    public function setBetaalDate(\DateTimeInterface $betaalDate): self
    {
        $this->betaalDate = $betaalDate;

        return $this;
    }

    public function getBetaalId(): ?float
    {
        return $this->betaalId;
    }

    public function setBetaalId(float $betaalId): self
    {
        $this->betaalId = $betaalId;

        return $this;
    }
}
