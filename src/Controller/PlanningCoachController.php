<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningCoachController extends AbstractController
{
    /**
     * @Route("/planning/coach", name="coach")
     */
    public function index(): Response
    {
        return $this->render('planning_coach/index.html.twig', [
            'controller_name' => 'PlanningCoachController',
        ]);
    }

    /**
     * @Route("/planning/coach/collective", name="collective")
     */
}
