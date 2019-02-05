<?php

namespace App\Controller;

use App\Entity\Terme;
use App\Form\TermeType;
use App\Repository\TermeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @Route("user/terme")
 */
class TermeController extends AbstractController
{
    /**
     * @Route("/", name="terme_index", methods={"GET"})
     */
    public function index(TermeRepository $termeRepository,AuthorizationCheckerInterface $authChecker): Response
    {
        
        if(false === $authChecker->isGranted('IS_AUTHENTICATED_FULLY'))
         return $this->redirectToRoute('infoclient');
        return $this->render('terme/index.html.twig', [
            'termes' => $termeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="terme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $terme = new Terme();
        $form = $this->createForm(TermeType::class, $terme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($terme);
            $entityManager->flush();

            return $this->redirectToRoute('terme_index');
        }

        return $this->render('terme/new.html.twig', [
            'terme' => $terme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="terme_show", methods={"GET"})
     */
    public function show(Terme $terme): Response
    {
        return $this->render('terme/show.html.twig', [
            'terme' => $terme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="terme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Terme $terme): Response
    {
        $form = $this->createForm(TermeType::class, $terme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('terme_index', [
                'id' => $terme->getId(),
            ]);
        }

        return $this->render('terme/edit.html.twig', [
            'terme' => $terme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="terme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Terme $terme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$terme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($terme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('terme_index');
    }
}
