<?php

namespace Album\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class AlbumController extends AbstractActionController 
{

    public function indexalbumAction() 
    {
        return new ViewModel();
    }
}
