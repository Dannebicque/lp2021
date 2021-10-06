<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{


    #[Route('/color/{couleur}', name: 'color')]
    public function index($couleur): Response
    {
        return $this->render('color/index.html.twig', [
            'couleur' => $couleur,
            'couleurs' => ['blue', 'red', 'yellow', 'orange', 'green', 'pink']
        ]);
    }

    #[Route('/request', name: 'request')]
    public function request(Request $request): Response
    {
        dump($request);
    }
}
