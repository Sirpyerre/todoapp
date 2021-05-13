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
        $now = new \DateTime();
        $data = [
            'title' => $task->title,
            'description' => $task->description,
            'creation_date' => $now->format('Y-m-d H:i:s'),
            'finish_date' => $task->finishDate ? $task->finishDate->format('Y-m-d H:i:s'): null,
            'finished' => $task->finished
        ];

        $id = (int) $task->id;

        if ($id === 0 ) {
            $this->tableGateway->insert($data);
            return;
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