<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp\Form;

use Laminas\Form\Element;
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
                'label' => 'Titulo'
            ]
        ]);

        $this->add([
            'name' => 'description',
            'type' => 'text',
            'options' => [
                'label' => 'Descripción'
            ]
        ]);

//        $this->add([
//            'name' => 'creationDate',
//            'type' => 'text',
//            'options' => [
//                'label' => 'Fecha de creación'
//            ]
//        ]);
//
//        $this->add([
//            'name' => 'finishDate',
//            'type' => 'text',
//            'options' => [
//                'label' => 'Fecha de finalización'
//            ]
//        ]);
//
//        $this->add([
//            'name' => 'finish',
//            'type' => Element\Checkbox::class,
//            'options' => [
//                'label' => 'Finalizada',
//                'use_hidden_element' => true,
//                'checked_value' => 'Yes',
//                'unchecked_value' => 'Not',
//            ],
//        ]);

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