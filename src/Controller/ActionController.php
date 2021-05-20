<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\WatchList;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActionController extends AbstractController
{
    /**
     * @Route("/add_watch/{id}", name="add_watch")
     */
    public function addWatch(Movie $movie, EntityManagerInterface $entityManager): Response
    {
        $watchList = new WatchList();
        $watchList->setUser($this->getUser());
        $watchList->setMovie($movie);
        $watchList->setSeen(false);

        $entityManager->persist($watchList);
        $entityManager->flush();

        return $this->redirectToRoute("app_home");
    }

    /**
     * @Route("/add_seen/{id}", name="add_seen")
     */
    public function addSeen(WatchList $watchList, EntityManagerInterface $entityManager): Response
    {
        $watchList->setSeen(true);

        $entityManager->persist($watchList);
        $entityManager->flush();

        return $this->redirectToRoute("app_watch_list");
    }
}
