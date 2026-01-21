<?php

namespace App\Controller;

use App\Entity\Acteur;
use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $repo = $entityManager->getRepository(Film::class);
        $lesFilms = $repo->findAll();

        return $this->render('film/index.html.twig', [
            'lesFilms' => $lesFilms,
        ]);
    }

    #[Route('/acteur/{id}', name: 'acteur_show')]
    public function show(EntityManagerInterface $entityManager, $id)
    {
        $acteur = $entityManager->getRepository(Acteur::class)->find($id);
        
        if (!$acteur) {
            throw $this->createNotFoundException(
                'No acteur found for id '.$id
            );
        }
        return $this->render('film/show.html.twig', [
            'acteur' => $acteur,
        ]);
    }

    #[Route('/ajouterActeur', name: 'add_acteur')]
    public function Ajouter(Request $request, EntityManagerInterface $em): Response
    {
        $acteur = new Acteur();

        $form = $this->createFormBuilder($acteur)
            ->add('nomActeur', TextType::class)
            ->add('Salaire', TextType::class)
            ->add('Nationalite', TextType::class)
            ->add('film', EntityType::class, [
                'class' => Film::class,
                'choice_label' => 'nomFilm',
            ])
            ->add('valider', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($acteur);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('film/ajouter.html.twig', [
            'f' => $form->createView(),
        ]);
    }

    #[Route("/addFilm", name: "add_film")]
    public function addF(Request $request, EntityManagerInterface $em)
    {
        $film = new Film();
        $form = $this->createForm("App\Form\FilmType", $film);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {               
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('film/ajouter.html.twig',
            ['f' => $form->createView()]);
    }

    #[Route("/suppFilm/{id}", name:"film_delete")]
    public function delete(Request $request, $id, EntityManagerInterface $em): Response
    {
        $c = $em->getRepository(Film::class)->find($id);
        if (!$c) {
            throw $this->createNotFoundException(
                'No film found for id '.$id
            );
        }
        $em->remove($c);
        $em->flush();
        return $this->redirectToRoute('home');
    }

#[Route('/editFilm/{id}', name: 'edit_film', methods: ['GET', 'POST'])]
    public function editAll(Request $request, $id, EntityManagerInterface $em)
    {
        $film = $em->getRepository(Film::class)->find($id);
        if (!$film) {
            throw $this->createNotFoundException(
                'No film found for id '.$id
            );
        }
        $fb = $this->createFormBuilder($film)
            ->add('nomFilm', TextType::class)
            ->add('image', TextType::class)
            ->add('Appeared_At', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('genre', TextType::class)
            ->add('Valider', SubmitType::class);
        
        $form = $fb->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('film/ajouter.html.twig',
            ['f' => $form->createView()] );
    }
}