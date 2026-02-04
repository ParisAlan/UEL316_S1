<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {

        $articles = $articleRepository->findAll();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);

    }    #[Route('/articles', name: 'app_home_articles')]
    public function articles_index(): Response
    {
        return $this->render('home/articles.html.twig', [

        ]);
    }
}
