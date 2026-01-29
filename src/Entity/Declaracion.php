<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'declaraciones')]
class Declaracion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'declaraciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Expediente $expediente = null;

    #[ORM\Column(length: 10)]
    private ?string $tipoModelo = null;

    #[ORM\Column(length: 10)]
    private ?string $periodo = null;

    #[ORM\Column(length: 4)]
    private ?string $ejercicio = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fechaDevengo = null;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $baseImponible = '0.00';

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private ?string $tipoGravamen = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $cuotaTributaria = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $retenciones = '0.00';

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private ?string $resultado = '0.00';

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fechaPresentacion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $numeroJustificante = null;

    #[ORM\Column(length: 30)]
    private ?string $estado = 'borrador';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfPath = null;

    #[ORM\OneToMany(mappedBy: 'declaracion', targetEntity: Renta::class, cascade: ['persist', 'remove'])]
    private Collection $rentas;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->rentas = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpediente(): ?Expediente
    {
        return $this->expediente;
    }

    public function setExpediente(?Expediente $expediente): static
    {
        $this->expediente = $expediente;
        return $this;
    }

    public function getTipoModelo(): ?string
    {
        return $this->tipoModelo;
    }

    public function setTipoModelo(string $tipoModelo): static
    {
        $this->tipoModelo = $tipoModelo;
        return $this;
    }

    public function getPeriodo(): ?string
    {
        return $this->periodo;
    }

    public function setPeriodo(string $periodo): static
    {
        $this->periodo = $periodo;
        return $this;
    }

    public function getEjercicio(): ?string
    {
        return $this->ejercicio;
    }

    public function setEjercicio(string $ejercicio): static
    {
        $this->ejercicio = $ejercicio;
        return $this;
    }

    public function getFechaDevengo(): ?\DateTimeInterface
    {
        return $this->fechaDevengo;
    }

    public function setFechaDevengo(\DateTimeInterface $fechaDevengo): static
    {
        $this->fechaDevengo = $fechaDevengo;
        return $this;
    }

    public function getBaseImponible(): ?string
    {
        return $this->baseImponible;
    }

    public function setBaseImponible(string $baseImponible): static
    {
        $this->baseImponible = $baseImponible;
        return $this;
    }

    public function getTipoGravamen(): ?string
    {
        return $this->tipoGravamen;
    }

    public function setTipoGravamen(string $tipoGravamen): static
    {
        $this->tipoGravamen = $tipoGravamen;
        return $this;
    }

    public function getCuotaTributaria(): ?string
    {
        return $this->cuotaTributaria;
    }

    public function setCuotaTributaria(string $cuotaTributaria): static
    {
        $this->cuotaTributaria = $cuotaTributaria;
        return $this;
    }

    public function getRetenciones(): ?string
    {
        return $this->retenciones;
    }

    public function setRetenciones(string $retenciones): static
    {
        $this->retenciones = $retenciones;
        return $this;
    }

    public function getResultado(): ?string
    {
        return $this->resultado;
    }

    public function setResultado(string $resultado): static
    {
        $this->resultado = $resultado;
        return $this;
    }

    public function getFechaPresentacion(): ?\DateTimeInterface
    {
        return $this->fechaPresentacion;
    }

    public function setFechaPresentacion(?\DateTimeInterface $fechaPresentacion): static
    {
        $this->fechaPresentacion = $fechaPresentacion;
        return $this;
    }

    public function getNumeroJustificante(): ?string
    {
        return $this->numeroJustificante;
    }

    public function setNumeroJustificante(?string $numeroJustificante): static
    {
        $this->numeroJustificante = $numeroJustificante;
        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;
        return $this;
    }

    public function getPdfPath(): ?string
    {
        return $this->pdfPath;
    }

    public function setPdfPath(?string $pdfPath): static
    {
        $this->pdfPath = $pdfPath;
        return $this;
    }

    public function getRentas(): Collection
    {
        return $this->rentas;
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
