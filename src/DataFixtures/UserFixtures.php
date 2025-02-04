<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@eightrealms.com')
            ->setPassword($this->passwordHasher->hashPassword($user, 'admin'))
            ->setRoles(['ROLE_ADMIN'])
            ->setName('Administrateur')
            ->setActive(true);
        $manager->persist($user);
        $this->addReference('user-admin', $user);

        $user = new User();
        $user->setEmail('player@eightrealms.com')
            ->setPassword($this->passwordHasher->hashPassword($user, 'player'))
            ->setName('Joueur Test')
            ->setActive(true);
        $manager->persist($user);
        $this->addReference('user-player', $user);

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 1;
    }
}
