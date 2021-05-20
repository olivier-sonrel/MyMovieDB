<?php


namespace App\Service;

use App\Repository\WatchListRepository;
use Symfony\Component\Security\Core\Security;

class WatchFilter
{

    private $watchRepo;
    private $security;

    public function __construct(WatchListRepository $watchListRepository, Security $security)
    {
        $this->security = $security;
        $this->watchRepo = $watchListRepository;
    }


    public function filter(array $movies): array
    {
        $watchlist = $this->watchRepo->findBy(['user' => $this->security->getUser()]);

        $moviesList = [];
        foreach ($watchlist as $line){
            $moviesList[] = $line->getMovie()->getId();
        }

        $moviesList = array_unique($moviesList);

        foreach ($movies as $movie){
            foreach ($moviesList as $id){
                if($id == $movie->getId()){
                    $movie->setInList(true);
                }
            }
        }

        return $movies;
    }
}