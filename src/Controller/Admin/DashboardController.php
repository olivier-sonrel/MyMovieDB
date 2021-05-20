<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Crud\MovieCrudController;
use App\Entity\Actor;
use App\Entity\Genre;
use App\Entity\Movie;
use App\Entity\Studio;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("IS_AUTHENTICATED_FULLY", message="No access! Get out!")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(MovieCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyMovieDB');
    }

    public function configureMenuItems(): iterable
    {
        return[
        MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),

        MenuItem::section('Movie'),
            MenuItem::linkToCrud('Movies', 'fa fa-tags', Movie::class),
            //MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

        MenuItem::section('Actor'),
            MenuItem::linkToCrud('Actors', 'fa fa-comment', Actor::class),
            //MenuItem::linkToCrud('Users', 'fa fa-user', User::class),

        MenuItem::section('Genre'),
            MenuItem::linkToCrud('Genres', 'fa fa-tags', Genre::class),
            //MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

        MenuItem::section('Studio'),
            MenuItem::linkToCrud('Studios', 'fa fa-comment', Studio::class),
            //MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
    ];
    }
}
