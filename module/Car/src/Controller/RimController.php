<?php

namespace Car\Controller;

use Car\Entity\Brand;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RimController extends AbstractActionController
{

    private $entityManager;

    /**
     * RimController constructor.
     * @param $entityManager
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function searchByParamsAction()
    {
        $brands = $this->entityManager->getRepository(Brand::class)->findAll();

        return new ViewModel([
            'brands' => $brands
        ]);
    }
}