<?php

namespace App\Controller;

use App\Entity\Collective;
use App\Form\CollectiveType;
use App\Repository\CollectiveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collective")
 */
class CollectiveController extends AbstractController
{
    /**
     * @Route("/", name="app_collective_index", methods={"GET"})
     */
    public function index(CollectiveRepository $collectiveRepository): Response
    {
        return $this->render('collective/index.html.twig', [
            'collectives' => $collectiveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_collective_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CollectiveRepository $collectiveRepository): Response
    {
        $collective = new Collective();
        $form = $this->createForm(CollectiveType::class, $collective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $collectiveRepository->add($collective, true);

            return $this->redirectToRoute('app_collective_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('collective/new.html.twig', [
            'collective' => $collective,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_collective_show", methods={"GET"})
     */
    public function show(Collective $collective): Response
    {
        return $this->render('collective/show.html.twig', [
            'collective' => $collective,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_collective_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Collective $collective, CollectiveRepository $collectiveRepository): Response
    {
        $form = $this->createForm(CollectiveType::class, $collective);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $collectiveRepository->add($collective, true);

            return $this->redirectToRoute('app_collective_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('collective/edit.html.twig', [
            'collective' => $collective,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_collective_delete", methods={"POST"})
     */
    public function delete(Request $request, Collective $collective, CollectiveRepository $collectiveRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collective->getId(), $request->request->get('_token'))) {
            $collectiveRepository->remove($collective, true);
        }

        return $this->redirectToRoute('app_collective_index', [], Response::HTTP_SEE_OTHER);
    }
}
