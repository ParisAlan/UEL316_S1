<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public const ADMIN_REF = 'user_admin';

    public const ADMIN_REF2 = 'user_admin2';

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // ===== ADMIN =====
        $admin = new User();
        $admin->setUsername('admin1');
        $admin->setRoles(['ROLE_USER','ROLE_ADMIN']);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin123'
        );

        $admin->setPassword($hashedPassword);

        $manager->persist($admin);
        $this->addReference(self::ADMIN_REF, $admin);

        // ===== ADMIN 2 =====
        $admin2 = new User();
        $admin2->setUsername('zazza2');
        $admin2->setRoles(['ROLE_USER','ROLE_ADMIN']);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin2,
            'password'
        );

        $admin2->setPassword($hashedPassword);

        $manager->persist($admin2);
        $this->addReference(self::ADMIN_REF2, $admin2);

        // ===== USER CLASSIQUE =====
        $user = new User();
        $user->setUsername('user123');
        $user->setRoles(['ROLE_USER']);

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'user123'
        );

        $user->setPassword($hashedPassword);

        $manager->persist($user);

        $manager->flush();
    }
}
