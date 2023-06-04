<?php

namespace App\Controller;

use App\Entity\FicheSan;
use App\Form\FicheSanType;
use App\Repository\FicheSanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/san")
 */
class FicheSanController extends AbstractController
{
    /**
     * @Route("/", name="app_fiche_san_index", methods={"GET"})
     */
    public function index(FicheSanRepository $ficheSanRepository): Response
    {
        return $this->render('fiche_san/index.html.twig', [
            'fiche_sans' => $ficheSanRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_fiche_san_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FicheSanRepository $ficheSanRepository): Response
    {
        $ficheSan = new FicheSan();
        $form = $this->createForm(FicheSanType::class, $ficheSan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheSanRepository->add($ficheSan, true);

            return $this->redirectToRoute('app_fiche_san_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_san/new.html.twig', [
            'fiche_san' => $ficheSan,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_fiche_san_show", methods={"GET"})
     */
    public function show(FicheSan $ficheSan): Response
    {
        return $this->render('fiche_san/show.html.twig', [
            'fiche_san' => $ficheSan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_fiche_san_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FicheSan $ficheSan, FicheSanRepository $ficheSanRepository): Response
    {
        $form = $this->createForm(FicheSanType::class, $ficheSan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ficheSanRepository->add($ficheSan, true);

            return $this->redirectToRoute('app_fiche_san_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_san/edit.html.twig', [
            'fiche_san' => $ficheSan,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_fiche_san_delete", methods={"POST"})
     */
    public function delete(Request $request, FicheSan $ficheSan, FicheSanRepository $ficheSanRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheSan->getId(), $request->request->get('_token'))) {
            $ficheSanRepository->remove($ficheSan, true);
        }

        return $this->redirectToRoute('app_fiche_san_index', [], Response::HTTP_SEE_OTHER);
    }
}
