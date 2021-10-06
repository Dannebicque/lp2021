<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky', name: 'lucky')]
    public function index(): Response
    {
        $number = mt_rand(0,100);
        return $this->render('lucky/index.html.twig', [
            'number' => $number
        ]);
    }

    #[Route('/time/now', name: 'time_now')]
    public function timeNow(): Response
    {
        $date = new DateTime('now');
        return $this->render('lucky/time.html.twig', [
            'date' => $date->format('d/m/Y H:i:s')
        ]);
    }
}
