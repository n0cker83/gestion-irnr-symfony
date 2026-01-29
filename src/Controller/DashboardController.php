<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\ExpedienteRepository;
use App\Repository\DeclaracionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function index(
        ClientRepository $clientRepo,
        ExpedienteRepository $expedienteRepo,
        DeclaracionRepository $declaracionRepo
    ): Response
    {
        // Obtener estadísticas
        $totalClients = count($clientRepo->findAll());
        $totalExpedientes = count($expedienteRepo->findAll());
        $declaracionesPendientes = count($declaracionRepo->findPendientes());
        
        // Últimos expedientes
        $ultimosExpedientes = $expedienteRepo->findBy([], ['createdAt' => 'DESC'], 5);
        
        return $this->render('dashboard/index.html.twig', [
            'total_clients' => $totalClients,
            'total_expedientes' => $totalExpedientes,
            'declaraciones_pendientes' => $declaracionesPendientes,
            'ultimos_expedientes' => $ultimosExpedientes,
        ]);
    }
}
