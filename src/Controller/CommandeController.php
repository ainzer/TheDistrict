<?php

namespace App\Controller;

use App\Entity\Commande as EntityCommande;
use App\Entity\Plat;
use App\Entity\Commande;
use App\Entity\Detail;
use App\Form\CommandeType;
use App\Repository\PlatRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function CommandeAjout(SessionInterface $session, PlatRepository $PlatRepository, EntityManagerInterface $em): Response
    {

        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier',[]);
        
        if($panier === []){

            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_catalogue');

        }

        $commande = new Commande();

        $commande->setUtilisateur($this->getUser());

        $datecommande = new DateTime();
        $commande->setDateCommande($datecommande);

        $total = 0;
        

        foreach($panier as $item => $quantite){

            $detailcommande = new Detail();

            $plat = $PlatRepository->find($item);

            $detailcommande->setPlat($plat);
            $detailcommande->setQuantite($quantite);
            $total += $plat->getPrix() * $quantite;

            $commande->addDetail($detailcommande);

        }

        $commande->setTotal($total);
        $commande->setEtat(0);
        $em->persist($commande);
        $em->flush();

        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    
    }

        #[Route('/commande', name: 'app_commande')]
        public function commande(Request $request): Response
    {
        $form = $this->createForm(CommandeType::class);

        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
            'commandeForm' => $form,
        ]);
    }
}