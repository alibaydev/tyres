<?php

namespace Application\Fixture;

use AMS\Entity\Language;
use AMS\Entity\Site;
use Application\Service\FixtureOrderHelper;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\Permission;

class LoadPermissions extends BaseFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $defaultPermissions = [
            'user.manage' => 'Manage users',
            'permission.manage' => 'Manage permissions',
            'role.manage' => 'Manage roles',
            'profile.any.view' => 'View anyone\'s profile',
            'profile.own.view' => 'View own profile',
        ];

        foreach ($defaultPermissions as $name=>$description) {
            $permission = new Permission();
            $permission->setName($name);
            $permission->setDescription($description);
            $permission->setDateCreated(date('Y-m-d H:i:s'));

            $this->entityManager->persist($permission);
        }

        $this->entityManager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return FixtureOrderHelper::LOAD_PERMISSIONS;
    }
}