<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UseradController extends AbstractController
{
    #[Route('/userad', name: 'app_userad')]
    public function index(): Response
    {
        return $this->render('userad/userad.html.twig', [
            'controller_name' => 'UseradController',
        ]);
    }
}
