<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class PageController extends AbstractController
{
    #[Route(path: '/{slug}', name: 'page', requirements: ['slug' => '[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*'])]
    public function show(string $slug, PageRepository $pageRepository): Response
    {
        $page = $pageRepository->findOneBy(['slug' => $slug]);
        if (!$page instanceof Page) {
            throw $this->createNotFoundException('Page not found');
        }

        return $this->render('page/page.html.twig', [
            'page' => $page,
        ]);
    }
}
