<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Controller;

use Laminas\View\Model\ViewModel;
use TodosApp\Form\TaskForm;
use TodosApp\Model\Task;
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

    public function createAction()
    {
        $form = new TaskForm();
        $form->get('submit')->setValue('Nueva');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $task = new Task();
        $form->setInputFilter($task->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $task->exchangeArray($form->getData());
        $this->table->saveTask($task);
        return $this->redirect()->toRoute('todos-app-index');
    }

    public function storeAction()
    {

    }

    public function showAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (0 === $id) {
            return $this->redirect()->toRoute('todo-app-create', ['action' => 'create']);
        }

        try {
            $task = $this->table->getTask($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('todos-app-index');
        }


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