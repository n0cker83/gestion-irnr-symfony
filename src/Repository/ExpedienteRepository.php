<?php

namespace App\Repository;

use App\Entity\Expediente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ExpedienteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expediente::class);
    }

    public function findByClientId(int $clientId): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.client = :clientId')
            ->setParameter('clientId', $clientId)
            ->orderBy('e.ejercicioFiscal', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByEjercicioFiscal(string $ejercicio): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.ejercicioFiscal = :ejercicio')
            ->setParameter('ejercicio', $ejercicio)
            ->orderBy('e.fechaApertura', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
