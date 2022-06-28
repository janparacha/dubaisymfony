<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use JetBrains\PhpStorm\Immutable;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function createEntity(string $entityFqcn) {
        $entity = new Post();
        $entity->setactive(true);
        return $entity;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
/*          ImageField::new ('picture')->setUploadDir('public/uploadpics'),*/
            TextField::new ('picture'),
            TextEditorField::new('content'),
            BooleanField::new('active'),
            DateTimeField::new('createdAt')->hideOnForm(),
        ];
    }
    
}
