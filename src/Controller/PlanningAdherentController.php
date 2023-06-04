<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningAdherentController extends AbstractController
{
    /**
     * @Route("/planning/adherent", name="adherent")
     */
    public function index(): Response
    {
        return $this->render('planning_adherent/index.html.twig', [
            'controller_name' => 'PlanningAdherentController',
        ]);
    }

    /**
     * @Route("/planning/adherent/libre", name="libre")
     */

    /**
     * @Route("/planning/adherent/collective", name="collective")
     */
}
