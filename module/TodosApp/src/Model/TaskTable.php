<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Model;


use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class TaskTable
{
    /** @var TableGatewayInterface */
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getTask($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveTask(Task $task)
    {
        $data = [
            'title' => $task->title,
            'description' => $task->description,
            'creation_date' => $task->creationDate,
            'finish_date' => $task->finishDate,
            'finished' => $task->finished
        ];

        $id = (int) $task->id;

        if ($id === 0 ) {
            $this->tableGateway->insert($data);
        }

        try {
            $this->getTask($id);
        } catch (\Exception $e){
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id'=>$id]);
    }

    public function deleteTask($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}