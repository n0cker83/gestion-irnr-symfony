<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'documentos')]
class Documento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'documentos')]
    private ?Expediente $expediente = null;

    #[ORM\ManyToOne]
    private ?Client $client = null;

    #[ORM\Column(length: 50)]
    private ?string $tipoDocumento = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreArchivo = null;

    #[ORM\Column(length: 500)]
    private ?string $rutaArchivo = null;

    #[ORM\Column(length: 100)]
    private ?string $mimeType = null;

    #[ORM\Column]
    private ?int $tamanho = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $fechaDocumento = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne]
    private ?User $uploadedBy = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;
        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(string $tipoDocumento): static
    {
        $this->tipoDocumento = $tipoDocumento;
        return $this;
    }

    public function getNombreArchivo(): ?string
    {
        return $this->nombreArchivo;
    }

    public function setNombreArchivo(string $nombreArchivo): static
    {
        $this->nombreArchivo = $nombreArchivo;
        return $this;
    }

    public function getRutaArchivo(): ?string
    {
        return $this->rutaArchivo;
    }

    public function setRutaArchivo(string $rutaArchivo): static
    {
        $this->rutaArchivo = $rutaArchivo;
        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): static
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getTamanho(): ?int
    {
        return $this->tamanho;
    }

    public function setTamanho(int $tamanho): static
    {
        $this->tamanho = $tamanho;
        return $this;
    }

    public function getFechaDocumento(): ?\DateTimeInterface
    {
        return $this->fechaDocumento;
    }

    public function setFechaDocumento(?\DateTimeInterface $fechaDocumento): static
    {
        $this->fechaDocumento = $fechaDocumento;
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

    public function getUploadedBy(): ?User
    {
        return $this->uploadedBy;
    }

    public function setUploadedBy(?User $uploadedBy): static
    {
        $this->uploadedBy = $uploadedBy;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
}
