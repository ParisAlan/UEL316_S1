<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {

        $articles = $articleRepository->getLastArticles();

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/articles', name: 'app_home_articles')]
    public function articles_index(ArticleRepository $articleRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query = $articleRepository->getAllArticlesFilters();

        $articles = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            7 /* limit per page */
        );


        return $this->render('home/articles.html.twig', [
            'articles' => $articles,
        ]);
    }
    #[Route('/articles/{id}', name: 'app_home_articles_detail')]
    public function articlesDetail(ArticleRepository $articleRepository, CommentRepository $commentRepository, $id): Response
    {

        $articles = $articleRepository->findOneBy(["id" => $id]);
        $comments = $commentRepository->findOneBy(["author" => $id ]);

        return $this->render('home/articlesDetail.html.twig', [
            'articles' => $articles,
            'comments' => $comments
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(ArticleRepository $articleRepository): Response
    {
        return $this->render('home/contact.html.twig', [
        ]);
    }
    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(ArticleRepository $articleRepository): Response
    {
        return $this->render('home/presentation.html.twig', [
        ]);
    }
}
