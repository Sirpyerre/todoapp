<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use TodosApp\Model\Task;
use TodosApp\Model\TaskTable;

class Module implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(): array
    {
        return [
            'factories' => [
                'TaskTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Task());
                    return new TableGateway('task',$dbAdapter, null, $resultSetPrototype);
                },
                'TodosApp\Model\TaskTable' => function ($sm) {
                    $tableGateWay = $sm->get('TaskTableGateway');
                    return new TaskTable($tableGateWay);
                }
//                Model\Task::class => function ($container) {
//                    $tableGateway = $container->get(Model\TaskTable::class);
//                    return new Model\TaskTable($tableGateway);
//                },
//                Model\TaskTable::class => function ($container) {
//                    $dbAdapter = $container->get(AdapterInterface::class);
//                    $resultSetPrototype = new ResultSet();
//                    $resultSetPrototype->setArrayObjectPrototype(new Model\Task());
//                    return new TableGateway('task', $dbAdapter, null, $resultSetPrototype);
//                }
            ]
        ];
    }

    public function getControllerConfig() :array
    {
        return [
            'factories' => [
                Controller\ToDoController::class => function ($container) {
                    return new Controller\ToDoController(
                        $container->get(Model\TaskTable::class)
                    );
                }
            ]
        ];
    }
}