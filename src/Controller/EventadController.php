<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventadController extends AbstractController
{
    #[Route('/eventad', name: 'app_eventad')]
    public function index(): Response
    {
        return $this->render('eventad/eventad.html.twig', [
            'controller_name' => 'EventadController',
        ]);
    }
}
