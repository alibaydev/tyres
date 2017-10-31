<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\Role;
use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;

class LoadUsers extends BaseFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        echo 'LOAD USERS';

        $user = $this->entityManager->getRepository(User::class)->findOneBy([]);
        if ($user==null) {
            $user = new User();
            $user->setEmail('admin@example.com');
            $user->setFirstName('Admin');
            $user->setLastName('Admin');
            $bcrypt = new Bcrypt();
            $passwordHash = $bcrypt->create('Secur1ty');
            $user->setPassword($passwordHash);
            $user->setActive(true);
            $user->setDateCreated(date('Y-m-d H:i:s'));

            // Assign user Administrator role
            $adminRole = $this->entityManager->getRepository(Role::class)
                ->findOneByName('Administrator');
            if ($adminRole==null) {
                throw new \Exception('Administrator role doesn\'t exist');
            }

            $user->getRoles()->add($adminRole);

            $moderator = new User();
            $moderator->setEmail('moderator@example.com');
            $moderator->setFirstName('Admin');
            $moderator->setLastName('Admin');
            $passwordHash = $bcrypt->create('Mecur1ty');
            $moderator->setPassword($passwordHash);
            $moderator->setActive(true);
            $moderator->setDateCreated(date('Y-m-d H:i:s'));

            $moderatorRole = $this->entityManager->getRepository(Role::class)
                ->findOneByName('Moderator');
            if ($moderatorRole==null) {
                throw new \Exception('Moderator role doesn\'t exist');
            }

            $moderator->getRoles()->add($moderatorRole);

            $this->entityManager->persist($user);
            $this->entityManager->persist($moderator);
            $this->entityManager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return FixtureOrderHelper::LOAD_USERS;
    }
}