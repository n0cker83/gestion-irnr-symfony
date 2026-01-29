<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function findActiveClients(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.estado = :estado')
            ->setParameter('estado', 'activo')
            ->orderBy('c.apellidos', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function searchByDocument(string $documento): ?Client
    {
        return $this->findOneBy(['numeroDocumento' => $documento]);
    }
}
