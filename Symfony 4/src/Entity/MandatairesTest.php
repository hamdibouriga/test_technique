<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MandatairesTestRepository")
 */
class MandatairesTest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dep;

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
    private $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentity(): ?string
    {
        return $this->identity;
    }

    public function setIdentity(?string $identity): self
    {
        $this->identity = $identity;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(?int $zipcode): self
    {
        $this->zipcode = $zipcode;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
