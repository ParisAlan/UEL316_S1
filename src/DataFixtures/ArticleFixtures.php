<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public const ARTICLE_REF = 'article 2';

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
        $this->addReference(self::ARTICLE_REF, $article2);

        // NOUVEAUX ARTICLES CINÉMA
        $articlesData = [
            [
                'title' => 'Dune : Partie 2 - Une suite épique attendue',
                'content' => '<p>Denis Villeneuve revient avec <em>Dune : Partie 2</em>, la suite ambitieuse de son adaptation du roman culte de Frank Herbert. Après avoir posé les bases d\'un univers dense et politique, le réalisateur plonge cette fois au cœur de la transformation de Paul Atréides, désormais pleinement engagé dans son destin.</p>
                                <p>Paul poursuit son apprentissage auprès des Fremen, peuple du désert d\'Arrakis, aux côtés de Chani. Mais derrière cette quête initiatique se cache une montée en puissance plus sombre : celle d\'un messie malgré lui, tiraillé entre amour, vengeance et prophétie.</p>
                                <p>Visuellement, le film est une claque. Tourné en IMAX, <em>Dune : Partie 2</em> déploie des paysages désertiques vertigineux, des compositions monumentales et une photographie à la fois épurée et hypnotique. Chaque plan semble pensé comme une fresque.</p>
                                <p>La bande originale de Hans Zimmer accompagne cette montée en tension avec des sonorités tribales, mystiques et puissantes. Le compositeur a développé de nouveaux instruments spécialement pour l\'univers d\'Arrakis afin de créer une identité sonore unique.</p>
                                <p><strong>Évolution des personnages :</strong> Timothée Chalamet livre ici une performance plus intense et habitée que dans le premier volet. Zendaya, plus présente à l\'écran, apporte une profondeur émotionnelle supplémentaire à Chani, loin d\'être un simple intérêt romantique.</p>
                                <p>Le casting s\'enrichit également avec Austin Butler, méconnaissable en Feyd-Rautha, antagoniste inquiétant et imprévisible. Sa performance apporte une tension nouvelle à l\'intrigue politique entre les grandes maisons.</p>
                                <p><strong>Anecdote de tournage :</strong> Une grande partie du film a été tournée dans le désert d\'Abu Dhabi et en Jordanie. Les équipes ont dû affronter des températures extrêmes dépassant les 45 degrés pour capturer le réalisme des paysages.</p>
                                <p><strong>Technologie :</strong> Les vers des sables ont été modélisés avec un niveau de détail inédit en CGI, combiné à des effets pratiques pour renforcer l\'immersion. Certaines scènes utilisent un mélange subtil de maquettes réelles et d\'effets numériques.</p>
                                <p><strong>Thématiques :</strong> Au-delà du spectacle, le film explore des thèmes profonds : le fanatisme religieux, la manipulation politique, le poids des attentes familiales et le danger des figures messianiques.</p>
                                <p><strong>Box-office :</strong> Dès ses premières semaines d\'exploitation, le film a dépassé les 600 millions de dollars au box-office mondial, confirmant le succès critique et commercial du premier opus.</p>
                                <p><strong>Réception critique :</strong> Les critiques saluent unanimement la maîtrise visuelle de Villeneuve et la maturité du récit, certains parlant déjà d\'une des meilleures adaptations de science-fiction de l\'histoire moderne du cinéma.</p>
                    <p>Avec cette deuxième partie, Denis Villeneuve ne se contente pas de livrer une suite spectaculaire : il construit une œuvre épique, ambitieuse et profondément cinématographique qui pourrait marquer durablement le genre.</p>',
                'image' => 'dune2.jpeg'
            ],
            [
                'title' => 'Oppenheimer remporte 7 Oscars',
                'content' => '<p>Christopher Nolan signe avec <em>Oppenheimer</em> un biopic ambitieux retraçant la vie et les dilemmes du physicien J. Robert Oppenheimer, souvent appelé le "père de la bombe atomique". Le film plonge dans les années de la Seconde Guerre mondiale et dans la création du projet Manhattan, avec une intensité dramatique rare.</p>
                                <p>Cillian Murphy incarne Oppenheimer avec une précision remarquable, montrant à la fois son génie scientifique, ses tourments éthiques et son poids émotionnel face aux conséquences de ses découvertes.</p>
                                <p>Le film explore non seulement les aspects scientifiques, mais aussi les enjeux politiques et humains : la pression des militaires, les débats moraux avec ses collègues et le fardeau de la responsabilité sur ses épaules.</p>
                                <p><strong>Anecdote :</strong> Nolan a choisi de filmer plusieurs séquences d’explosions réelles pour retranscrire l’impact visuel et émotionnel de la première explosion nucléaire, sans recours massif au CGI.</p>
                                <p><strong>Fun fact :</strong> Cillian Murphy a suivi un entraînement intensif pour ressembler physiquement à Oppenheimer, perdant du poids et adoptant des postures et expressions fidèles aux photographies historiques.</p>
                                <p><strong>Durée et structure :</strong> Avec ses trois heures, le film se déploie comme un thriller scientifique et politique, alternant moments d’action, tension dramatique et introspection philosophique.</p>
                                <p><strong>Musique :</strong> La bande originale, signée Ludwig Göransson, mêle compositions orchestrales et sonorités expérimentales pour amplifier l’intensité dramatique et le suspense.</p>
                                <p><strong>Réception :</strong> Les critiques saluent la maîtrise narrative et visuelle de Nolan, soulignant la profondeur des personnages et la rigueur historique, tout en rendant le récit accessible et captivant pour un large public.</p>
                                <p><strong>Box-office et impact :</strong> Déjà considéré comme un des grands films de l’année, <em>Oppenheimer</em> fascine les spectateurs autant par sa portée intellectuelle que par sa puissance cinématographique.</p>
                                <p><strong>Thématiques :</strong> Le film questionne le poids de la science, les responsabilités morales des chercheurs, et l’impact irréversible de l’homme sur l’histoire et la civilisation. Il explore aussi la dualité entre ambition et conscience, entre gloire et culpabilité.</p>
                                <p><strong>À savoir :</strong> Nolan a travaillé en étroite collaboration avec des historiens et physiciens pour garantir une authenticité totale, des dialogues aux expériences scientifiques, renforçant l’immersion et le réalisme du film.</p>
                                <p>Avec <em>Oppenheimer</em>, Christopher Nolan livre un portrait fascinant, un thriller historique et un drame humain qui laisse une empreinte durable dans l’histoire du cinéma et dans l’imaginaire collectif.</p>',
                'image' => 'oppenheimer.jpeg'
            ],
            [
                'title' => 'Le retour de Star Wars au cinéma',
                'content' => '<p>La saga Star Wars continue d\'évoluer avec les nouveaux films annoncés par Disney, explorant des époques jamais vues et approfondissant les histoires de personnages emblématiques. Le premier film de cette nouvelle ère, réalisé par Shawn Levy, introduit une galaxie lointaine encore inexplorée, avec de nouveaux héros et de nouvelles menaces.</p>
                                <p>Chris et Natalie Portman reprennent leurs rôles iconiques, ajoutant profondeur et continuité à la saga. Alors que Padmé Amidala continue d\'influencer les événements politiques, Obi-Wan Kenobi et de nouveaux Jedi prennent une place centrale dans la lutte contre des forces obscures encore inconnues.</p>
                                <p>Les nouveaux films abordent également la complexité des conflits entre différents clans, la montée de factions rivales et les choix moraux difficiles auxquels doivent faire face les héros. La narration se concentre autant sur les personnages que sur les batailles spatiales spectaculaires et les duels au sabre laser, offrant un équilibre parfait entre émotion et action.</p>
                                <p><strong>Anecdote :</strong> Natalie Portman a repris l\'entraînement physique intensif pour ses scènes de combat, alliant arts martiaux et chorégraphie de sabre laser pour un rendu réaliste.</p>
                                <p><strong>Fun fact :</strong> Chris a improvisé plusieurs répliques dans des moments clés qui ont été conservées au montage final, renforçant la profondeur de son personnage.</p>
                                <p><strong>Technologie :</strong> Les effets spéciaux combinent CGI avancée, décors pratiques et technologie de capture de mouvement pour créer des batailles spatiales d\'une intensité inédite.</p>
                                <p><strong>Thématiques :</strong> Les films explorent le poids des décisions, le destin, le passage du temps et la transmission des valeurs dans une galaxie en guerre. Ils mettent en lumière la force de l\'espoir et du courage face à des obstacles presque insurmontables.</p>
                                <p><strong>Box-office :</strong> Les projections anticipées et les bandes-annonces ont déjà créé un engouement mondial énorme, avec des records de préventes dans plusieurs pays.</p>
                                <p><strong>Réception :</strong> Les fans et critiques saluent la cohérence avec les films originaux, la profondeur des personnages et l\'équilibre entre nostalgie et innovation.</p>
                                <p><strong>À savoir :</strong> Ces films marquent un tournant stratégique pour Lucasfilm, qui souhaite reconquérir les fans historiques tout en séduisant une nouvelle génération. L\'esthétique visuelle mélange influences classiques et éléments modernes pour renouveler la saga.</p>
                                <p>Avec cette nouvelle trilogie, Star Wars s\'offre une renaissance ambitieuse, combinant aventures épiques, drames émotionnels et univers richement développé, garantissant aux spectateurs un voyage inoubliable dans une galaxie lointaine, très lointaine.</p>',


                'image' => 'starwars.jpeg'
            ],
            [
                'title' => 'Barbie : Le phénomène culturel de l\'année',
                'content' => '<p>Greta Gerwig signe avec <em>Barbie</em> un film audacieux qui mélange comédie, satire sociale et spectacle visuel. Margot Robbie incarne Barbie, qui commence à questionner sa vie parfaite dans le monde en plastique de Barbieland avant de découvrir le monde réel.</p>
                                <p>Le film explore l\'identité, la pression sociale et la quête de soi à travers les yeux d\'un personnage iconique. Barbie, confrontée à l\'imperfection du monde réel, doit apprendre à concilier ses idéaux et ses émotions avec la complexité humaine.</p>
                                <p>Ryan Gosling brille dans le rôle de Ken, apportant une touche d\'humour et de charme décalé. Leur dynamique comique et tendre constitue le cœur du récit, oscillant entre scènes absurdes et moments touchants.</p>
                                <p>Visuellement, le film est un feu d\'artifice : décors rose fluo grandeur nature, costumes extravagants et effets spéciaux qui donnent vie à l\'univers de Barbie comme jamais auparavant.</p>
                                <p><strong>Anecdote :</strong> La production a utilisé une quantité massive de peinture rose pour recréer Barbieland, causant même une pénurie temporaire de certains tons sur le marché mondial.</p>
                                <p><strong>Fun fact :</strong> Ryan Gosling a improvisé plusieurs scènes musicales et comiques, dont certaines sont devenues virales sur les réseaux sociaux.</p>
                                <p><strong>Thématiques :</strong> Le film aborde subtilement le féminisme, l\'acceptation de soi et l\'importance de la diversité à travers un récit léger et accessible à tous les âges.</p>
                                <p><strong>Box-office :</strong> Avec plus de 1,4 milliard de dollars de recettes mondiales, <em>Barbie</em> est devenu le film le plus lucratif de 2023, confirmant son impact culturel mondial.</p>
                                <p><strong>Impact culturel :</strong> Le phénomène "Barbiecore" a envahi la mode, les réseaux sociaux et les tapis rouges internationaux, inspirant de nombreuses tendances esthétiques et discussions sur l\'identité.</p>
                                <p><strong>Réception :</strong> Critiques et spectateurs saluent l\'équilibre parfait entre humour, émotion et réflexion sociale, qualifiant le film de "chef-d\'œuvre pop moderne".</p>
                                <p><strong>Conclusion :</strong> <em>Barbie</em> n\'est pas qu\'un film sur une poupée : c\'est un voyage visuel, émotionnel et culturel qui allie magie, comédie et profondeur, laissant une empreinte durable dans le cinéma contemporain.</p>',

                'image' => 'barbie.jpeg'
            ],
            [
                'title' => 'Avatar 3 : Nouveaux détails révélés',
                'content' => '<p>James Cameron revient avec <em>Avatar 3 : Fire and Ash</em>, le troisième volet tant attendu de sa saga Pandora. Après les succès colossaux des deux premiers films, Cameron poursuit son exploration d\'un monde à la fois magnifique et dangereux, mêlant enjeux écologiques, conflits interplanétaires et drames humains.</p>
                                <p>Le film introduit de nouveaux clans Na\'vi, de nouvelles régions de Pandora et des créatures inédites, repoussant encore les limites de la technologie de capture de mouvement et des effets spéciaux. La production a mis l\'accent sur le réalisme immersif, avec des scènes sous-marines tournées directement en studio grâce à une technologie inédite.</p>
                                <p>Les personnages principaux, déjà connus, continuent leur voyage émotionnel et politique. Jake Sully et Neytiri doivent faire face à de nouvelles menaces qui mettent en péril l\'équilibre fragile de Pandora. De nouveaux visages, parmi lesquels certains alliés inattendus, viennent enrichir le récit et les dynamiques entre clans Na\'vi et humains.</p>
                                <p><strong>Anecdote :</strong> Les acteurs ont suivi un entraînement d\'apnée intensif pour les scènes sous-marines, certains tenant jusqu\'à 7 minutes sans respirer, afin de rendre les interactions crédibles et immersives.</p>
                                <p><strong>Technologie :</strong> Cameron a combiné capture de mouvement sous-marine, CGI haute définition et décors physiques pour créer des scènes d\'une fluidité et d\'une profondeur jamais vues au cinéma.</p>
                                <p><strong>Fun fact :</strong> Kate Winslet reprend son rôle de Ronal et détient le record de la plus longue scène sous l\'eau filmée en une seule prise pour un film hollywoodien.</p>
                                <p><strong>Thématiques :</strong> <em>Avatar 3</em> continue d\'explorer la nature, la colonisation, les conflits culturels et la responsabilité individuelle face à l\'écologie et aux choix politiques.</p>
                                <p><strong>Box-office :</strong> Déjà avant sa sortie officielle, le film suscite un engouement mondial considérable, avec des projections anticipées dans plus de 60 pays et des ventes de billets record.</p>
                                <p><strong>Enjeux :</strong> Cameron ne se contente pas de créer un spectacle visuel : il cherche à poser une réflexion sur l\'avenir de notre planète à travers un récit épique et universel, mêlant aventure, émotion et réflexion écologique.</p>
                                <p>Avec <em>Avatar 3 : Fire and Ash</em>, James Cameron repousse encore une fois les frontières du cinéma moderne, offrant aux spectateurs un voyage émotionnel et visuel inoubliable, où chaque plan est une invitation à explorer Pandora dans toute sa splendeur et sa complexité.</p>',
                'image' => 'avatar3.jpeg'
            ],
            [
                'title' => 'Wonka : Un préquel musical enchanteur',
                'content' => '<p><em>Wonka</em> nous plonge dans les origines du plus célèbre chocolatier du cinéma. Réalisé par Paul King, déjà derrière les films <em>Paddington</em>, ce préquel raconte l\'ascension du jeune Willy Wonka, interprété par Timothée Chalamet, bien avant l\'ouverture de sa mythique chocolaterie.</p>
                                <p>Arrivé sans argent mais avec des rêves plein la tête, Wonka affronte un cartel de chocolatiers puissants et corrompus qui contrôlent le marché. Grâce à son imagination débordante et à son optimisme inébranlable, il va tenter de révolutionner l\'univers sucré.</p>
                                <p>Visuellement, le film est un véritable enchantement. Les décors colorés, les costumes extravagants et les créations chocolatées improbables donnent au long-métrage une atmosphère féerique et chaleureuse.</p>
                                <p><strong>Performance :</strong> Timothée Chalamet surprend dans un registre plus léger et musical. Il apporte au personnage une douceur et une naïveté touchante, tout en conservant le mystère propre à Wonka.</p>
                                <p>Le casting secondaire brille également, notamment Olivia Colman dans un rôle savoureux et Hugh Grant qui incarne un Oompa Loompa entièrement recréé grâce à la capture de mouvement.</p>
                                <p><strong>Anecdote :</strong> Les numéros musicaux ont été répétés pendant plusieurs mois afin d\'obtenir une chorégraphie fluide et naturelle. Chalamet interprète lui-même ses chansons.</p>
                                <p><strong>Univers :</strong> Le film s\'inspire fortement de l\'esprit des romans de Roald Dahl, tout en proposant une touche moderne et accessible à un nouveau public.</p>
                                <p><strong>Thématiques :</strong> Au-delà de la magie et de l\'humour, <em>Wonka</em> parle de persévérance, de créativité et de la capacité à croire en ses rêves malgré les obstacles.</p>
                                <p><strong>Ambiance musicale :</strong> Les chansons originales apportent une énergie communicative et participent à l\'identité unique du film, entre comédie musicale classique et fantaisie contemporaine.</p>
                                <p><strong>Réception :</strong> Le film a été salué pour son ton optimiste et familial, ainsi que pour sa direction artistique soignée et immersive.</p>
                                <p>Avec <em>Wonka</em>, le public redécouvre la genèse d\'un personnage iconique dans un récit chaleureux, drôle et visuellement somptueux, où chaque scène semble saupoudrée d\'une pincée de magie.</p>',
                'image' => 'wonka.png'
            ],
            [
                'title' => 'Gladiator 2 : Ridley Scott frappe encore',
                'content' => '<p>Vingt-quatre ans après le triomphe monumental de <em>Gladiator</em>, Ridley Scott retourne dans l\'arène avec une suite ambitieuse et spectaculaire. <em>Gladiator 2</em> s\'intéresse cette fois à Lucius, le fils de Lucilla, profondément marqué par le sacrifice de Maximus.</p>
                                <p>Désormais adulte, Lucius se retrouve plongé malgré lui dans les jeux de pouvoir de l\'Empire romain. Entre complots politiques, manipulations et luttes sanglantes, le jeune homme devra trouver sa propre voie dans un monde dominé par la brutalité et la soif de pouvoir.</p>
                                <p>Paul Mescal incarne un Lucius intense et déterminé, prêt à honorer l\'héritage de Maximus tout en forgeant sa propre légende. Son interprétation oscille entre vulnérabilité et rage contenue.</p>
                                <p>Le casting impressionne : Denzel Washington rejoint l\'univers dans un rôle mystérieux, stratège redoutable évoluant dans l\'ombre du pouvoir. Pedro Pascal incarne un général romain charismatique dont les loyautés restent ambiguës.</p>
                                <p><strong>Une production colossale :</strong> Ridley Scott a misé sur des décors gigantesques et des milliers de figurants pour recréer la grandeur de la Rome antique. Les scènes d\'arène promettent d\'être encore plus spectaculaires que dans le film original.</p>
                                <p><strong>Anecdote :</strong> Certaines scènes ont été tournées dans des lieux historiques en Europe afin de conserver un maximum d\'authenticité visuelle.</p>
                                <p><strong>Héritage :</strong> Le premier <em>Gladiator</em> avait remporté 5 Oscars, dont celui du Meilleur Film et du Meilleur Acteur pour Russell Crowe. La barre est donc placée très haut pour cette suite.</p>
                                <p><strong>Musique :</strong> La bande originale rend hommage aux compositions mythiques de Hans Zimmer tout en introduisant de nouvelles thématiques plus sombres et plus épiques.</p>
                                <p><strong>Thématiques :</strong> Le film explore la transmission, le poids de l\'héritage, la corruption du pouvoir et la quête d\'identité dans un empire en déclin.</p>
                                <p><strong>Attentes :</strong> Après plusieurs années de rumeurs et de reports, l\'attente des fans est immense. Ridley Scott promet un film à la fois respectueux de l\'original et audacieux dans sa vision.</p>
                                <p>Plus qu\'une simple suite, <em>Gladiator 2</em> ambitionne de raviver la flamme du péplum moderne et de replonger le public dans l\'intensité brute des combats d\'arène, où chaque affrontement est une question de survie et d\'honneur.</p>',
                'image' => 'gladiator2.png'
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
