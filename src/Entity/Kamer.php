<?php

namespace App\Entity;

use App\Repository\KamerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KamerRepository::class)
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prijs;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="kamerId")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=Extras::class, mappedBy="kamerId")
     */
    private $extras;

    /**
     * @ORM\ManyToOne(targetEntity=soort::class, inversedBy="kamers")
     */
    private $soortId;

    /**
     * @ORM\OneToMany(targetEntity=Reservering::class, mappedBy="kamerId")
     */
    private $reserverings;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->extras = new ArrayCollection();
        $this->reserverings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(float $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setKamerId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getKamerId() === $this) {
                $image->setKamerId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Extras[]
     */
    public function getExtras(): Collection
    {
        return $this->extras;
    }

    public function addExtra(Extras $extra): self
    {
        if (!$this->extras->contains($extra)) {
            $this->extras[] = $extra;
            $extra->setKamerId($this);
        }

        return $this;
    }

    public function removeExtra(Extras $extra): self
    {
        if ($this->extras->contains($extra)) {
            $this->extras->removeElement($extra);
            // set the owning side to null (unless already changed)
            if ($extra->getKamerId() === $this) {
                $extra->setKamerId(null);
            }
        }

        return $this;
    }

    public function getSoortId(): ?soort
    {
        return $this->soortId;
    }

    public function setSoortId(?soort $soortId): self
    {
        $this->soortId = $soortId;

        return $this;
    }

    /**
     * @return Collection|Reservering[]
     */
    public function getReserverings(): Collection
    {
        return $this->reserverings;
    }

    public function addReservering(Reservering $reservering): self
    {
        if (!$this->reserverings->contains($reservering)) {
            $this->reserverings[] = $reservering;
            $reservering->setKamerId($this);
        }

        return $this;
    }

    public function removeReservering(Reservering $reservering): self
    {
        if ($this->reserverings->contains($reservering)) {
            $this->reserverings->removeElement($reservering);
            // set the owning side to null (unless already changed)
            if ($reservering->getKamerId() === $this) {
                $reservering->setKamerId(null);
            }
        }

        return $this;
    }
}
