<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Controller;

use Laminas\View\Model\ViewModel;

class ToDoController extends \Laminas\Mvc\Controller\AbstractActionController
{
    public function indexAction(): ViewModel
    {
        $message = $this->params()->fromQuery('message', 'foo');
        return new ViewModel(['message' => $message]);
    }

    public function createAction(): ViewModel
    {
        return new ViewModel([]);
    }

    public function storeAction()
    {

    }

    public function showAction()
    {

    }

    public function editAction()
    {

    }

    public function updateAction()
    {

    }

    public function deleteAction()
    {

    }
}