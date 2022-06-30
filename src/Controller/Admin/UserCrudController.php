<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email')->hideOnForm(),
            TextField::new('password')->setMaxLength(15) ->hideOnForm(),
            ChoiceField::new('gender')->setChoices(
                [
                'masculin' => 1,
                'feminin' => 0,
                ]
        ),
            TextField::new('name'),
            TextField::new('surname'),
            TelephoneField::new('phone'),
            AssociationField::new('addresses'),
            ArrayField::new('roles'),
            BooleanField::new('isVerified'),

        ];
    }
    
}
