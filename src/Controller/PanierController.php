<?php
namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, PlatRepository $platRepository)
    {
        $panier = $session->get('panier', []);

        // On initialise des variables
        $data = [];
        $total = 0;

        foreach($panier as $id => $quantity){
            $plat = $platRepository->find($id);

            $data[] = [
                'plat' => $plat,
                'quantity' => $quantity
            ];
            $total += $plat->getPrix() * $quantity;
        }

        return $this->render('panier/index.html.twig', compact('data', 'total'));
    }

    #[Route('/ajout/{id}', name: 'ajout')]
    public function add(Plat $plat, SessionInterface $session)
    {
        // On récupère l'id du produit
        $id = $plat->getId();

        // On récupère le panier existant
        $panier = $session->get('panier', []);

        // On ajoute le produit dans le panier s'il n'y est pas encore
        // Sinon on incrémente sa quantité
        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }

        $session->set('panier', $panier);
        
        // On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }
}