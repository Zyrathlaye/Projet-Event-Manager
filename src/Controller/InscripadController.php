<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscripadController extends AbstractController
{
    #[Route('/inscripad', name: 'app_inscripad')]
    public function index(): Response
    {
        return $this->render('inscripad/inscripad.html.twig', [
            'controller_name' => 'InscripadController',
        ]);
    }
}
