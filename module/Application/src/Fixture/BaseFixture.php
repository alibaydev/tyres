<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\FixtureInterface;
use DoctrineDataFixtureModule\ContainerAwareInterface;
use DoctrineDataFixtureModule\ContainerAwareTrait;
use DoctrineORMModule\Options\EntityManager;
use Interop\Container\ContainerInterface;

abstract class BaseFixture implements FixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param ContainerInterface $container
     * @return null
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        $this->entityManager = $container->get('doctrine.entitymanager.orm_default');
    }
}