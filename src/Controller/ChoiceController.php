<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Studio;
use App\Repository\ActorRepository;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\StudioRepository;
use App\Repository\WatchListRepository;
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
     * @Route("/by/actor/{id}", name="show_by_actor")
     */
    public function showByActor(Actor $actor): Response
    {
        $movies = $actor->getMovies();

        return $this->render('choice/actor.html.twig', [
            'movies' => $movies,
            'actor' => $actor,
        ]);
    }

    /**
     *
     * @Route("/by/genre/{id}", name="show_by_genre")
     */
    public function showByGenre(Genre $genre): Response
    {
        $movies = $genre->getMovies();

        return $this->render('choice/genre.html.twig', [
            'movies' => $movies,
            'genre' => $genre,
        ]);
    }

    /**
     *
     * @Route("/by/studio/{id}", name="show_by_studio")
     */
    public function showByStudio(Studio $studio): Response
    {
        $movies = $studio->getMovies();

        return $this->render('choice/studio.html.twig', [
            'movies' => $movies,
            'studio' => $studio,
        ]);
    }
}
