<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthentificationController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function index(): Response
    {
        return $this->render('authentification/index.html.twig', [
            'controller_name' => 'AuthentificationController',
        ]);
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil(): Response
    {
        return $this->render('authentification/accueil.html.twig', [
            'controller_name' => 'AuthentificationController',
        ]);
    }
}
