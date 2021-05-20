<?php

namespace App\Controller\Admin\Crud;

use App\Entity\Actor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actor::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstName'),
            TextField::new('lastName'),
            ImageField::new('image')->setUploadDir("/public/assets/upload/image")
                ->setBasePath("assets/upload/image"),
        ];
    }

}
