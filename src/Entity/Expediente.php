<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'expedientes')]
class Expediente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $numeroExpediente = null;

    #[ORM\ManyToOne(inversedBy: 'expedientes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\Column(length: 50)]
    private ?string $tipoExpediente = null;

    #[ORM\Column(length: 4)]
    private ?string $ejercicioFiscal = null;

    #[ORM\Column(length: 30)]
    private ?string $estado = 'borrador';

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fechaApertura = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fechaCierre = null;

    #[ORM\ManyToOne]
    private ?User $responsable = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notas = null;

    #[ORM\OneToMany(mappedBy: 'expediente', targetEntity: Declaracion::class, cascade: ['persist', 'remove'])]
    private Collection $declaraciones;

    #[ORM\OneToMany(mappedBy: 'expediente', targetEntity: Documento::class, cascade: ['persist', 'remove'])]
    private Collection $documentos;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->declaraciones = new ArrayCollection();
        $this->documentos = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroExpediente(): ?string
    {
        return $this->numeroExpediente;
    }

    public function setNumeroExpediente(string $numeroExpediente): static
    {
        $this->numeroExpediente = $numeroExpediente;
        return $this;
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

    public function getTipoExpediente(): ?string
    {
        return $this->tipoExpediente;
    }

    public function setTipoExpediente(string $tipoExpediente): static
    {
        $this->tipoExpediente = $tipoExpediente;
        return $this;
    }

    public function getEjercicioFiscal(): ?string
    {
        return $this->ejercicioFiscal;
    }

    public function setEjercicioFiscal(string $ejercicioFiscal): static
    {
        $this->ejercicioFiscal = $ejercicioFiscal;
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

    public function getFechaApertura(): ?\DateTimeInterface
    {
        return $this->fechaApertura;
    }

    public function setFechaApertura(\DateTimeInterface $fechaApertura): static
    {
        $this->fechaApertura = $fechaApertura;
        return $this;
    }

    public function getFechaCierre(): ?\DateTimeInterface
    {
        return $this->fechaCierre;
    }

    public function setFechaCierre(?\DateTimeInterface $fechaCierre): static
    {
        $this->fechaCierre = $fechaCierre;
        return $this;
    }

    public function getResponsable(): ?User
    {
        return $this->responsable;
    }

    public function setResponsable(?User $responsable): static
    {
        $this->responsable = $responsable;
        return $this;
    }

    public function getNotas(): ?string
    {
        return $this->notas;
    }

    public function setNotas(?string $notas): static
    {
        $this->notas = $notas;
        return $this;
    }

    public function getDeclaraciones(): Collection
    {
        return $this->declaraciones;
    }

    public function addDeclaracion(Declaracion $declaracion): static
    {
        if (!$this->declaraciones->contains($declaracion)) {
            $this->declaraciones->add($declaracion);
            $declaracion->setExpediente($this);
        }
        return $this;
    }

    public function removeDeclaracion(Declaracion $declaracion): static
    {
        if ($this->declaraciones->removeElement($declaracion)) {
            if ($declaracion->getExpediente() === $this) {
                $declaracion->setExpediente(null);
            }
        }
        return $this;
    }

    public function getDocumentos(): Collection
    {
        return $this->documentos;
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
