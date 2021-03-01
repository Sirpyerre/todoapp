<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Model;


class Task extends \ArrayObject
{
    public $id;
    public $title;
    public $description;
    public $creationDate;
    public $finishDate;
    public $finished;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
        $this->description = !empty($data['description']) ? $data['description'] : null;
        $this->creationDate = !empty($data['creation_date']) ? $data['creation_date'] : null;
        $this->finishDate = !empty($data['finish_date']) ? $data['finish_date'] : null;
        $this->finished = !empty($data['finished']) ? $data['finished'] : null;
    }
}