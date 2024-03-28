<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/commande', name: 'app_commande_')]
class CommandeController extends AbstractController
{
    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, PlatRepository $platRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_catalogue');
        }

        // Le panier n'est pas vide, on crée la commande
        $commande = new Commande();

        // On parcourt le panier pour créer les détails de commande
        foreach($panier as $item => $quantity){
            $commandeDetais = new Detail();

            // On va chercher le produit
            $plat = $platRepository->find($item);
            
        }


        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}
