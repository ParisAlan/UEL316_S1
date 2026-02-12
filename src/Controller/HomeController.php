<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Entity\Article;
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

    #[Route('/articles/{id}', name: 'app_home_articles_detail', methods: ['GET', 'POST'])]
    public function articlesDetail(Request $request, Article $article, EntityManagerInterface $entityManager): Response
    {
        // On reprend le fonctionnement du CRUD fais pour Comment
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $this->getUser()) {
            $comment->setAuthor($this->getUser());
            $comment->setArticle($article);

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('app_home_articles_detail', [
                'id' => $article->getId()
            ]);
        }

        return $this->render('home/articlesDetail.html.twig', [
            'articles' => $article,
            'form' => $form->createView()
        ]);
    }
}
