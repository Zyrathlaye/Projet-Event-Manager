<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentadController extends AbstractController
{
    #[Route('/commentad', name: 'app_commentad')]
    public function index(): Response
    {
        return $this->render('commentad/commentad.html.twig', [
            'controller_name' => 'CommentadController',
        ]);
    }
}
