<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FollowupController extends AbstractController
{
    #[Route('/followup', name: 'app_followup')]
    public function index(): Response
    {
        return $this->render('followup/index.html.twig', [
            'controller_name' => 'FollowupController',
        ]);
    }
}
