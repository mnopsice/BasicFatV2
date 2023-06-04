<?php

namespace App\Controller;

use App\Entity\Coachs;
use App\Form\CoachsType;
use App\Repository\CoachsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coachs")
 */
class CoachsController extends AbstractController
{
    /**
     * @Route("/", name="app_coachs_index", methods={"GET"})
     */
    public function index(CoachsRepository $coachsRepository): Response
    {
        return $this->render('coachs/index.html.twig', [
            'coachs' => $coachsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_coachs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CoachsRepository $coachsRepository): Response
    {
        $coach = new Coachs();
        $form = $this->createForm(CoachsType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachsRepository->add($coach, true);

            return $this->redirectToRoute('app_coachs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coachs/new.html.twig', [
            'coach' => $coach,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_coachs_show", methods={"GET"})
     */
    public function show(Coachs $coach): Response
    {
        return $this->render('coachs/show.html.twig', [
            'coach' => $coach,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_coachs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Coachs $coach, CoachsRepository $coachsRepository): Response
    {
        $form = $this->createForm(CoachsType::class, $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coachsRepository->add($coach, true);

            return $this->redirectToRoute('app_coachs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('coachs/edit.html.twig', [
            'coach' => $coach,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_coachs_delete", methods={"POST"})
     */
    public function delete(Request $request, Coachs $coach, CoachsRepository $coachsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coach->getId(), $request->request->get('_token'))) {
            $coachsRepository->remove($coach, true);
        }

        return $this->redirectToRoute('app_coachs_index', [], Response::HTTP_SEE_OTHER);
    }
}
