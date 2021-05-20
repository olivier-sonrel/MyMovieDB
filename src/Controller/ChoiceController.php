<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Studio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoiceController extends AbstractController
{
    /**
     * @Route("/movie/{id}", name="show_movie")
     */
    public function showMovie(Movie $movie): Response
    {
        return $this->render('choice/movie.html.twig', [
            'movie' => $movie,
        ]);
    }

    /**
     * @Route("/actor/{id}", name="show_actor")
     */
    public function showActor(Actor $actor): Response
    {
        return $this->render('choice/actor.html.twig', [
            'actor' => $actor,
        ]);
    }

    /**
     * TEMPLATE LIST
     * @Route("/genre/{id}", name="show_genre")
     */
    public function showGenre(Genre $genre): Response
    {
        return $this->render('choice/list.html.twig', [
            'list' => $genre,
        ]);
    }

    /**
     * TEMPLATE LIST
     * @Route("/studio/{id}", name="show_studio")
     */
    public function showStudio(Studio $studio): Response
    {
        return $this->render('choice/list.html.twig', [
            'list' => $studio,
        ]);
    }
}
