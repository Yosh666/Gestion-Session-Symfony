<?php

namespace App\Controller;

use App\Entity\Blocmodule;
use App\Form\BlocmoduleType;
use App\Repository\BlocmoduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blocmodule")
 */
class BlocmoduleController extends AbstractController
{
    /**
     * @Route("/", name="blocmodule_index", methods={"GET"})
     */
    public function index(BlocmoduleRepository $blocmoduleRepository): Response
    {
        return $this->render('blocmodule/index.html.twig', [
            'blocmodules' => $blocmoduleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="blocmodule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blocmodule = new Blocmodule();
        $form = $this->createForm(BlocmoduleType::class, $blocmodule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blocmodule);
            $entityManager->flush();

            return $this->redirectToRoute('blocmodule_index');
        }

        return $this->render('blocmodule/new.html.twig', [
            'blocmodule' => $blocmodule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blocmodule_show", methods={"GET"})
     */
    public function show(Blocmodule $blocmodule): Response
    {
        return $this->render('blocmodule/show.html.twig', [
            'blocmodule' => $blocmodule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blocmodule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Blocmodule $blocmodule): Response
    {
        $form = $this->createForm(BlocmoduleType::class, $blocmodule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blocmodule_index');
        }

        return $this->render('blocmodule/edit.html.twig', [
            'blocmodule' => $blocmodule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blocmodule_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Blocmodule $blocmodule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blocmodule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blocmodule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blocmodule_index');
    }
}
