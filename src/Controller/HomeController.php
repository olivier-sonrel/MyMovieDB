<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use App\Repository\GenreRepository;
use App\Repository\MovieRepository;
use App\Repository\StudioRepository;
use App\Repository\WatchListRepository;
use App\Service\WatchFilter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $movieRepo;
    private $genreRepo;
    private $actorRepo;
    private $studioRepo;
    private $watchRepo;

    public function __construct(MovieRepository $movieRepository,
                                GenreRepository $genreRepository,
                                ActorRepository $actorRepository,
                                StudioRepository $studioRepository,
                                WatchListRepository $watchListRepository)
    {
        $this->movieRepo = $movieRepository;
        $this->genreRepo = $genreRepository;
        $this->actorRepo = $actorRepository;
        $this->studioRepo = $studioRepository;
        $this->watchRepo = $watchListRepository;
    }

    /**
     * @Route("/", name="app_home")
     */
    public function index(WatchFilter $watchFilter): Response
    {
        $movies = $this->movieRepo->findAll();

        $watchFilter->filter($movies);

        return $this->render('home/index.html.twig', [
            'movies' => $this->movieRepo->findAll(),
        ]);
    }

    /**
     * @Route("/watch_list", name="app_watch_list")
     */
    public function watchList(): Response
    {
        $watchlist = $this->watchRepo->findBy(['user' => $this->getUser(), 'seen' => false]);
        $watched = $this->watchRepo->findBy(['user' => $this->getUser(), 'seen' => true]);

        return $this->render('home/watch.html.twig', [
            'watchlist' => $watchlist,
            'watched' => $watched,
        ]);
    }

    /**
     * @Route("/genres", name="app_genres")
     */
    public function genres(): Response
    {
        return $this->render('home/genre.html.twig', [
            'genres' => $this->genreRepo->findAll(),
        ]);
    }

    /**
     * @Route("/actors", name="app_actors")
     */
    public function actors(): Response
    {
        return $this->render('home/actors.html.twig', [
            'actors' => $this->actorRepo->findAll(),
        ]);
    }

    /**
     * @Route("/studios", name="app_studios")
     */
    public function studios(): Response
    {
        return $this->render('home/studio.html.twig', [
            'studios' => $this->studioRepo->findAll(),
        ]);
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }
}
