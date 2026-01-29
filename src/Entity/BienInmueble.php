<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'bienes_inmuebles')]
class BienInmueble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bienesInmuebles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\Column(length: 50)]
    private ?string $referenciaCatastral = null;

    #[ORM\Column(type: 'text')]
    private ?string $direccionCompleta = null;

    #[ORM\Column(length: 100)]
    private ?string $provincia = null;

    #[ORM\Column(length: 100)]
    private ?string $municipio = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $codigoPostal = null;

    #[ORM\Column(length: 20)]
    private ?string $tipoBien = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private ?string $porcentajePropiedad = '100.00';

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fechaAdquisicion = null;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $valorCatastral = '0.00';

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $superficieConstruida = null;

    #[ORM\Column]
    private ?bool $activo = true;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;
        return $this;
    }

    public function getReferenciaCatastral(): ?string
    {
        return $this->referenciaCatastral;
    }

    public function setReferenciaCatastral(string $referenciaCatastral): static
    {
        $this->referenciaCatastral = $referenciaCatastral;
        return $this;
    }

    public function getDireccionCompleta(): ?string
    {
        return $this->direccionCompleta;
    }

    public function setDireccionCompleta(string $direccionCompleta): static
    {
        $this->direccionCompleta = $direccionCompleta;
        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): static
    {
        $this->provincia = $provincia;
        return $this;
    }

    public function getMunicipio(): ?string
    {
        return $this->municipio;
    }

    public function setMunicipio(string $municipio): static
    {
        $this->municipio = $municipio;
        return $this;
    }

    public function getCodigoPostal(): ?string
    {
        return $this->codigoPostal;
    }

    public function setCodigoPostal(?string $codigoPostal): static
    {
        $this->codigoPostal = $codigoPostal;
        return $this;
    }

    public function getTipoBien(): ?string
    {
        return $this->tipoBien;
    }

    public function setTipoBien(string $tipoBien): static
    {
        $this->tipoBien = $tipoBien;
        return $this;
    }

    public function getPorcentajePropiedad(): ?string
    {
        return $this->porcentajePropiedad;
    }

    public function setPorcentajePropiedad(string $porcentajePropiedad): static
    {
        $this->porcentajePropiedad = $porcentajePropiedad;
        return $this;
    }

    public function getFechaAdquisicion(): ?\DateTimeInterface
    {
        return $this->fechaAdquisicion;
    }

    public function setFechaAdquisicion(\DateTimeInterface $fechaAdquisicion): static
    {
        $this->fechaAdquisicion = $fechaAdquisicion;
        return $this;
    }

    public function getValorCatastral(): ?string
    {
        return $this->valorCatastral;
    }

    public function setValorCatastral(string $valorCatastral): static
    {
        $this->valorCatastral = $valorCatastral;
        return $this;
    }

    public function getSuperficieConstruida(): ?string
    {
        return $this->superficieConstruida;
    }

    public function setSuperficieConstruida(?string $superficieConstruida): static
    {
        $this->superficieConstruida = $superficieConstruida;
        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
