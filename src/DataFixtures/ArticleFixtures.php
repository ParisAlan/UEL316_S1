<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Article 1
        $article1 = new Article();
        $article1->setTitle('Premier article Symfony');
        $article1->setContent('Contenu de démonstration...');
        $article1->setImage('nkobless.png');
        $article1->addAuthor(
            $this->getReference(UserFixtures::ADMIN_REF, User::class)
        );

        $manager->persist($article1);

        // Article 2 (2 auteurs)
        $article2 = new Article();
        $article2->setTitle('Article collaboratif');
        $article2->setContent('Article écrit par plusieurs auteurs...');
        $article2->setImage('nkobless.png');
        $article2->addAuthor(
            $this->getReference(UserFixtures::ADMIN_REF, User::class)
        );

        $article2->addAuthor(
            $this->getReference(UserFixtures::ADMIN_REF2, User::class)
        );

        $manager->persist($article2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
