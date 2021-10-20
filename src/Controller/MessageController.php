<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Entity\Message;
use App\Repository\AuteurRepository;
use App\Repository\CategorieRepository;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'message')]
    public function index(
        CategorieRepository $categorieRepository,
        AuteurRepository $auteurRepository, EntityManagerInterface $entityManager): Response
    {
        $auteur = $auteurRepository->find(1);
        $categorie = $categorieRepository->find(1);

        $message = new Message();
        $message->setTitre('Premier message');
        $message->setMessage('Le message de mon premier message');
        $message->setAuteur($auteur);

        $message->addCategory($categorie);
        //ou $categorie->addMessage($message);

        $entityManager->persist($message);
        $entityManager->flush();

        return $this->render('message/index.html.twig', [
            'message' => $message
        ]);
    }

    #[Route('/messages', name: 'messages')]
    public function messages(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();

        return $this->render('message/messages.html.twig', [
            'messages' => $messages
        ]);
    }

    #[Route('/edit/{id}', name: 'message_edit')]
    public function edit(Message $message): Response
    {
        //fait automatiquement un select * from message where id = id et stocke le résultat dans message
        return $this->render('message/index.html.twig', [
            'message' => $message
        ]);
    }

    #[Route('/delete/{id}', name: 'message_delete')]
    public function delete(EntityManagerInterface $entityManager, Message $message): Response
    {
        $entityManager->remove($message);
        $entityManager->flush();
        return $this->redirectToRoute('messages');
    }



}
