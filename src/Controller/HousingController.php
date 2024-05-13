<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HousingController extends AbstractController
{
    #[Route('/housing', name: 'app_housing')]
    public function index(): Response
    {
        return $this->render('housing/index.html.twig', [
            'controller_name' => 'HousingController',
        ]);
    }
}
