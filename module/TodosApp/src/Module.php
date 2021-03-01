<?php
/**
 * @author Pedro Rojas <pedro.rojas@gmail.com>
 */

namespace TodosApp;
class Module
{
    public function getConfig() : array
    {
        return include __DIR__ .  '/../config/module.config.php';
    }
}