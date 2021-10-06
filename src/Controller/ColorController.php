<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{
    #[Route('/color/{couleur}', name: 'color')]
    public function index($couleur): Response
    {
        return $this->render('color/index.html.twig', [
            'couleur' => $couleur
        ]);
    }
}
