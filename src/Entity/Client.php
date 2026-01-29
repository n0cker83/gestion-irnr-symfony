<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'clients')]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $apellidos = null;

    #[ORM\Column(length: 20)]
    private ?string $tipoDocumento = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $numeroDocumento = null;

    #[ORM\Column(length: 100)]
    private ?string $paisResidencia = null;

    #[ORM\Column(length: 100)]
    private ?string $paisNacionalidad = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fechaNacimiento = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $direccionExtranjero = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $direccionEspana = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $telefono = null;

    #[ORM\Column(length: 20)]
    private ?string $estado = 'activo';

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Expediente::class)]
    private Collection $expedientes;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: BienInmueble::class)]
    private Collection $bienesInmuebles;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->expedientes = new ArrayCollection();
        $this->bienesInmuebles = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    // Getters y Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): static
    {
        $this->apellidos = $apellidos;
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

    public function getNumeroDocumento(): ?string
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento(string $numeroDocumento): static
    {
        $this->numeroDocumento = $numeroDocumento;
        return $this;
    }

    public function getPaisResidencia(): ?string
    {
        return $this->paisResidencia;
    }

    public function setPaisResidencia(string $paisResidencia): static
    {
        $this->paisResidencia = $paisResidencia;
        return $this;
    }

    public function getPaisNacionalidad(): ?string
    {
        return $this->paisNacionalidad;
    }

    public function setPaisNacionalidad(string $paisNacionalidad): static
    {
        $this->paisNacionalidad = $paisNacionalidad;
        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): static
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    public function getDireccionExtranjero(): ?string
    {
        return $this->direccionExtranjero;
    }

    public function setDireccionExtranjero(?string $direccionExtranjero): static
    {
        $this->direccionExtranjero = $direccionExtranjero;
        return $this;
    }

    public function getDireccionEspana(): ?string
    {
        return $this->direccionEspana;
    }

    public function setDireccionEspana(?string $direccionEspana): static
    {
        $this->direccionEspana = $direccionEspana;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): static
    {
        $this->telefono = $telefono;
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

    public function getExpedientes(): Collection
    {
        return $this->expedientes;
    }

    public function addExpediente(Expediente $expediente): static
    {
        if (!$this->expedientes->contains($expediente)) {
            $this->expedientes->add($expediente);
            $expediente->setClient($this);
        }
        return $this;
    }

    public function removeExpediente(Expediente $expediente): static
    {
        if ($this->expedientes->removeElement($expediente)) {
            if ($expediente->getClient() === $this) {
                $expediente->setClient(null);
            }
        }
        return $this;
    }

    public function getBienesInmuebles(): Collection
    {
        return $this->bienesInmuebles;
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

    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellidos;
    }
}
