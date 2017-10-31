<?php

namespace Car\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RimController extends AbstractActionController
{
    public function searchByParamsAction()
    {
        return new ViewModel([
            'brands' => []
        ]);
    }
}