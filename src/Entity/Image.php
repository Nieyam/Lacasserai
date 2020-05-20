<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=kamer::class, inversedBy="images")
     */
    private $kamerId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    public function setImageFile(string $imageFile): self
    {
        $this->imageFile = $imageFile;

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
