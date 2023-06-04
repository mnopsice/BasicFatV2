<?php

namespace App\Controller;

use App\Entity\Libre;
use App\Form\LibreType;
use App\Repository\LibreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/libre")
 */
class LibreController extends AbstractController
{
    /**
     * @Route("/", name="app_libre_index", methods={"GET"})
     */
    public function index(LibreRepository $libreRepository): Response
    {
        return $this->render('libre/index.html.twig', [
            'libres' => $libreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_libre_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LibreRepository $libreRepository): Response
    {
        $libre = new Libre();
        $form = $this->createForm(LibreType::class, $libre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $libreRepository->add($libre, true);

            return $this->redirectToRoute('app_libre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('libre/new.html.twig', [
            'libre' => $libre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_libre_show", methods={"GET"})
     */
    public function show(Libre $libre): Response
    {
        return $this->render('libre/show.html.twig', [
            'libre' => $libre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_libre_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Libre $libre, LibreRepository $libreRepository): Response
    {
        $form = $this->createForm(LibreType::class, $libre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $libreRepository->add($libre, true);

            return $this->redirectToRoute('app_libre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('libre/edit.html.twig', [
            'libre' => $libre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_libre_delete", methods={"POST"})
     */
    public function delete(Request $request, Libre $libre, LibreRepository $libreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$libre->getId(), $request->request->get('_token'))) {
            $libreRepository->remove($libre, true);
        }

        return $this->redirectToRoute('app_libre_index', [], Response::HTTP_SEE_OTHER);
    }
}
