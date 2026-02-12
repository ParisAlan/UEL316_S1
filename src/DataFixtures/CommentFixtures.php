<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $comment1 = new Comment();
        $comment1->setTitle('Test - Commentaire');
        $comment1->setContent('Super article ! Hâte de le voir ! :D');

        // On récupère les références définies dans les autres fixtures
        $comment1->setAuthor(
            $this->getReference(UserFixtures::ADMIN_REF, User::class)
        );

        $comment1->setArticle(
            $this->getReference(ArticleFixtures::ARTICLE_REF, Article::class)
        );

        $manager->persist($comment1);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            ArticleFixtures::class,
        ];
    }
}
