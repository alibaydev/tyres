<?php

namespace Application\Fixture;

use Application\Service\FixtureOrderHelper;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\Permission;
use User\Entity\Role;

class LoadRoles extends BaseFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $role = $this->entityManager->getRepository(Role::class)
            ->findOneBy([]);
        if ($role!=null)
            return; // Some roles already exist; do nothing.

        $defaultRoles = [
            'Moderator' => [
                'description' => 'A person who manages content',
                'parent' => null,
                'permissions' => [
                    'profile.any.view',
                ],
            ],
            'Administrator' => [
                'description' => 'A person who manages users, roles, etc.',
                'parent' => 'Moderator',
                'permissions' => [
                    'user.manage',
                    'role.manage',
                    'permission.manage',
                ],
            ],
            'Guest' => [
                'description' => 'A person who can log in and view own profile.',
                'parent' => null,
                'permissions' => [
                    'profile.own.view',
                ],
            ],
        ];

        foreach ($defaultRoles as $name=>$info) {

            // Create new role
            $role = new Role();
            $role->setName($name);
            $role->setDescription($info['description']);
            $role->setDateCreated(date('Y-m-d H:i:s'));

            // Assign parent role
            if ($info['parent']!=null) {
                $parentRole = $this->entityManager->getRepository(Role::class)
                    ->findOneByName($info['parent']);
                if ($parentRole==null) {
                    throw new \Exception('Parent role ' . $info['parent'] . ' doesn\'t exist');
                }

                $role->getParentRoles()->add($parentRole);
            }

            $this->entityManager->persist($role);

            // Assign permissions to role
            $permissions = $this->entityManager->getRepository(Permission::class)
                ->findByName($info['permissions']);
            foreach ($permissions as $permission) {
                $role->getPermissions()->add($permission);
            }

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
        return FixtureOrderHelper::LOAD_ROLES;
    }
}