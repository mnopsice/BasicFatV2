<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FicheSanitaireController extends AbstractController
{
    /**
     * @Route("/sanitaire", name="sanitaire")
     */
    public function index(): Response
    {
        return $this->render('fiche_sanitaire/index.html.twig', [
            'controller_name' => 'FicheSanitaireController',
        ]);
    }

    /**
     * @Route("/sanitaire/historique", name="historique")
     */

    /**
     * @Route("/sanitaire/sante", name="sante")
     */

    /**
     * @Route("/sanitaire/sante/graphique", name="graphique")
     */

    /**
     * @Route("/sanitaire/enregistrer", name="enregistrer")
     */

    /**
     * @Route("/sanitaire/fixer", name="fixer")
     */
}
