<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeclaracionController extends AbstractController
{
    #[Route('/declaracion', name: 'app_declaracion')]
    public function index(): Response
    {
        return $this->render('declaracion/index.html.twig', [
            'controller_name' => 'DeclaracionController',
        ]);
    }
}
