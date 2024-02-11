<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        // Ajoutez ici la logique pour récupérer les données nécessaires à afficher sur la page d'accueil
        // Par exemple, récupérez les événements à venir depuis la base de données

        $events = [
            [
                'title' => 'Conférence sur la Science des Données',
                'date' => '2024-01-30',
                'location' => 'Amphithéâtre A',
                'description' => 'Une conférence passionnante sur l\'utilisation des données dans la science.',
            ],
            [
                'title' => "Séminaire sur l'Intelligence Artificielle",
                'date' => '2024-02-05',
                'location' => 'Salle de Conférence C',
                'description' => 'Un séminaire pour explorer les dernières avancées en intelligence artificielle.',
            ],
            
        ];

        // Passez les données à la vue pour les afficher
        return $this->render('home/index.html.twig', [
            'events' => $events,
        ]);
    }
}
