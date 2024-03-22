<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PlatCategorieController extends AbstractController
{
    #[Route('/plat/categorie', name: 'app_plat_categorie')]
    public function index(): Response
    {
        return $this->render('plat_categorie/index.html.twig', [
            'controller_name' => 'PlatCategorieController',
        ]);
    }
}
