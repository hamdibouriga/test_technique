<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\AnnoncesRepository")
 */
class Annonces
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $annonce_id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_jugement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siren;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaires;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dep;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceId(): ?int
    {
        return $this->annonce_id;
    }

    public function setAnnonceId(?int $annonce_id): self
    {
        $this->annonce_id = $annonce_id;

        return $this;
    }

    public function getDateJugement(): ?\DateTimeInterface
    {
        return $this->date_jugement;
    }

    public function setDateJugement(?\DateTimeInterface $date_jugement): self
    {
        $this->date_jugement = $date_jugement;

        return $this;
    }

    public function getSiren(): ?int
    {
        return $this->siren;
    }

    public function setSiren(?int $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getNic(): ?int
    {
        return $this->nic;
    }

    public function setNic(?int $nic): self
    {
        $this->nic = $nic;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getDep(): ?int
    {
        return $this->dep;
    }

    public function setDep(?int $dep): self
    {
        $this->dep = $dep;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
