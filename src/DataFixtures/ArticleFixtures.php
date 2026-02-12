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
        $article2->setImage('nkozzz.png');
        $article2->addAuthor(
            $this->getReference(UserFixtures::ADMIN_REF, User::class)
        );
        $article2->addAuthor(
            $this->getReference(UserFixtures::ADMIN_REF2, User::class)
        );
        $manager->persist($article2);

        // NOUVEAUX ARTICLES CINÉMA
        $articlesData = [
            [
                'title' => 'Dune : Partie 2 - Une suite épique attendue',
                'content' => '<p>Denis Villeneuve revient avec la suite tant attendue de son adaptation magistrale de Dune. Paul Atréides poursuit son voyage épique aux côtés de Chani et des Fremen, tandis qu\'il cherche à venger sa famille.</p><p>Les visuels sont à couper le souffle, la bande-son de Hans Zimmer est encore plus immersive, et les performances des acteurs atteignent des sommets. Timothée Chalamet et Zendaya portent le film avec une intensité remarquable.</p>',
                'image' => 'dune2.jpeg'
            ],
            [
                'title' => 'Oppenheimer remporte 7 Oscars',
                'content' => '<p>Le chef-d\'œuvre de Christopher Nolan sur le "père de la bombe atomique" a dominé la 96e cérémonie des Oscars. Cillian Murphy a remporté son premier Oscar pour son interprétation magistrale de J. Robert Oppenheimer.</p><p>Le film a également remporté les prix du Meilleur Film, Meilleur Réalisateur, Meilleur Acteur dans un Second Rôle (Robert Downey Jr.), Meilleure Photographie, Meilleur Montage et Meilleure Musique.</p>',
                'image' => 'oppenheimer.jpeg'
            ],
            [
                'title' => 'Le retour de Star Wars au cinéma',
                'content' => '<p>Disney a officiellement annoncé trois nouveaux films Star Wars. Le premier sera réalisé par Shawn Levy et se concentrera sur une nouvelle ère de la galaxie lointaine.</p><p>Dave Filoni travaille sur un film qui servira de conclusion à la série The Mandalorian, tandis que James Mangold explore les origines des Jedi dans un film se déroulant 25 000 ans avant la saga Skywalker.</p>',
                'image' => 'starwars.jpeg'
            ],
            [
                'title' => 'Barbie : Le phénomène culturel de l\'année',
                'content' => '<p>Greta Gerwig a transformé une simple poupée en commentaire social brillant et hilarant. Margot Robbie incarne une Barbie parfaite qui découvre le monde réel, accompagnée d\'un Ryan Gosling inoubliable en Ken.</p><p>Avec plus de 1,4 milliard de dollars au box-office mondial, Barbie est devenu le film le plus lucratif de 2023 et a lancé d\'innombrables conversations sur le féminisme, l\'identité et la culture pop.</p>',
                'image' => 'barbie.jpeg'
            ],
            [
                'title' => 'Avatar 3 : Nouveaux détails révélés',
                'content' => '<p>James Cameron a partagé de nouvelles informations sur Avatar : Fire and Ash, le troisième volet de sa saga Pandora. Le film explorera de nouveaux clans Na\'vi et introduira "les pires qualités des humains" selon le réalisateur.</p><p>La production utilise de nouvelles technologies de capture de mouvement sous-marine et promet des séquences visuelles encore plus spectaculaires.</p>',
                'image' => 'avatar3.jpeg'
            ],
            [
                'title' => 'Wonka : Un préquel musical enchanteur',
                'content' => '<p>Timothée Chalamet se glisse dans les chaussures du jeune Willy Wonka dans ce préquel musical réalisé par Paul King. Le film raconte comment le célèbre chocolatier a débuté son entreprise magique.</p><p>Avec des numéros musicaux entraînants, une esthétique visuelle somptueuse et une distribution talentueuse incluant Olivia Colman et Hugh Grant, Wonka capture l\'esprit fantaisiste de Roald Dahl.</p>',
                'image' => 'wonka.jpeg'
            ],
            [
                'title' => 'Gladiator 2 : Ridley Scott frappe encore',
                'content' => '<p>24 ans après le chef-d\'œuvre original, Ridley Scott revient dans l\'arène avec Gladiator 2. Paul Mescal incarne Lucius, le fils de Lucilla, dans cette suite qui promet action, drame et spectacle.</p><p>Denzel Washington rejoint le casting dans un rôle mystérieux, tandis que Pedro Pascal incarne un général romain. Les premières images révèlent des batailles épiques et une production somptueuse.</p>',
                'image' => 'gladiator2.jpeg'
            ]
        ];

        foreach ($articlesData as $data) {
            $article = new Article();
            $article->setTitle($data['title']);
            $article->setContent($data['content']);
            $article->setImage($data['image']);
            $article->addAuthor(
                $this->getReference(UserFixtures::ADMIN_REF, User::class)
            );
            $manager->persist($article);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
