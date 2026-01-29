<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'rentas')]
class Renta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'rentas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Declaracion $declaracion = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?BienInmueble $bienInmueble = null;

    #[ORM\Column(length: 20)]
    private ?string $tipoRenta = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fechaInicioAlquiler = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fechaFinAlquiler = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?string $importeMensual = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $importeTotalPeriodo = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $gastosDeducibles = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $rentaNeta = '0.00';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descripcion = null;

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

    public function getDeclaracion(): ?Declaracion
    {
        return $this->declaracion;
    }

    public function setDeclaracion(?Declaracion $declaracion): static
    {
        $this->declaracion = $declaracion;
        return $this;
    }

    public function getBienInmueble(): ?BienInmueble
    {
        return $this->bienInmueble;
    }

    public function setBienInmueble(?BienInmueble $bienInmueble): static
    {
        $this->bienInmueble = $bienInmueble;
        return $this;
    }

    public function getTipoRenta(): ?string
    {
        return $this->tipoRenta;
    }

    public function setTipoRenta(string $tipoRenta): static
    {
        $this->tipoRenta = $tipoRenta;
        return $this;
    }

    public function getFechaInicioAlquiler(): ?\DateTimeInterface
    {
        return $this->fechaInicioAlquiler;
    }

    public function setFechaInicioAlquiler(?\DateTimeInterface $fechaInicioAlquiler): static
    {
        $this->fechaInicioAlquiler = $fechaInicioAlquiler;
        return $this;
    }

    public function getFechaFinAlquiler(): ?\DateTimeInterface
    {
        return $this->fechaFinAlquiler;
    }

    public function setFechaFinAlquiler(?\DateTimeInterface $fechaFinAlquiler): static
    {
        $this->fechaFinAlquiler = $fechaFinAlquiler;
        return $this;
    }

    public function getImporteMensual(): ?string
    {
        return $this->importeMensual;
    }

    public function setImporteMensual(string $importeMensual): static
    {
        $this->importeMensual = $importeMensual;
        return $this;
    }

    public function getImporteTotalPeriodo(): ?string
    {
        return $this->importeTotalPeriodo;
    }

    public function setImporteTotalPeriodo(string $importeTotalPeriodo): static
    {
        $this->importeTotalPeriodo = $importeTotalPeriodo;
        return $this;
    }

    public function getGastosDeducibles(): ?string
    {
        return $this->gastosDeducibles;
    }

    public function setGastosDeducibles(string $gastosDeducibles): static
    {
        $this->gastosDeducibles = $gastosDeducibles;
        return $this;
    }

    public function getRentaNeta(): ?string
    {
        return $this->rentaNeta;
    }

    public function setRentaNeta(string $rentaNeta): static
    {
        $this->rentaNeta = $rentaNeta;
        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;
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
