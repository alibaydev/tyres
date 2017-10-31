<?php

namespace Car;

use AMS\Entity\Site;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Service\ViewHelperManagerFactory;
use Zend\View\HelperPluginManager;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
