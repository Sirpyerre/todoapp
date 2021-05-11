<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Form;

use Laminas\Form\Form;

class TaskForm extends Form
{
    /**
     * TaskForm constructor.
     */
    public function __construct()
    {
        parent::__construct('task');

        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Título'
            ]
        ]);

        $this->add([
            'name' => 'description',
            'type' => 'text',
            'options' => [
                'label' => 'Descripción'
            ]
        ]);

        $this->add([
           'name' => 'submit',
           'type' => 'submit',
           'attributes' => [
               'value' => 'Go',
               'id' => 'submitbutton'
           ]
        ]);
    }
}