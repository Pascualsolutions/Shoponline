<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // PRVI TAB: Osnovno
            FormField::addTab('Osnovno'),
            IdField::new('id')->hideOnForm(),
            TextField::new('name')->setColumns(6),
            SlugField::new('slug')->setTargetFieldName('name')->setColumns(6),
            TextEditorField::new('content')->setColumns(12),

            // DRUGI TAB: SEO
            FormField::addTab('SEO'),
            TextField::new('seoTitle')->setColumns(12)->setLabel('Seo Naslov'),
            TextEditorField::new('seoDesc')->setColumns(12)->setLabel('Seo Opis'),
        ];
    }
}
