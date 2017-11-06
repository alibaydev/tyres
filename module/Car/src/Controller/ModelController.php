<?php

namespace Car\Controller;

use Car\Entity\Brand;
use Car\Entity\Model;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ModelController extends AbstractActionController
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

    public function searchByBrandAction()
    {
        $brandId = (int)$this->params()->fromRoute('brandId');
        $models = $this->entityManager->getRepository(Model::class)->findByBrandId($brandId);

        return new JsonModel($models);
    }
}