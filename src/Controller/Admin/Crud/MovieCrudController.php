<?php

namespace App\Controller\Admin\Crud;

use App\Entity\Movie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MovieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Movie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('voName'),
            TextEditorField::new('synopsis'),
            AssociationField::new('actors'),
            AssociationField::new('genres'),
            AssociationField::new('studios'),
            DateField::new('releaseDate'),
            ImageField::new('image')->setUploadDir("/public/assets/upload/image")
                ->setBasePath("assets/upload/image"),

        ];
    }

    public function createEntity(string $entityFqcn): Movie
    {
        $movie = new Movie();
        $movie->setCreatedBy($this->getUser());

        return $movie;
    }

}
