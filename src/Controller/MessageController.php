<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'message')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $message = new Message();
        $message->setTitre('Premier message');
        $message->setMessage('Le message de mon premier message');

        $entityManager->persist($message);
        $entityManager->flush();

        return $this->render('message/index.html.twig', [
            'message' => $message
        ]);
    }
}
