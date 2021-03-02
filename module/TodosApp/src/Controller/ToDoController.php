<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Controller;

use Laminas\View\Model\ViewModel;
use TodosApp\Model\TaskTable;

class ToDoController extends \Laminas\Mvc\Controller\AbstractActionController
{
    /** @var TaskTable */
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction(): ViewModel
    {
        $tasks = $this->table->fetchAll();
        return new ViewModel(['tasks' => $tasks]);
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