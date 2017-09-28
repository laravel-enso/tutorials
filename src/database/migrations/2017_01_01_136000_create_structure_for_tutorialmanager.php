<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTutorialManager extends StructureMigration
{
    protected $permissionGroup = [
        'name' => 'system.tutorials', 'description' => 'Tuturials permissions group',
    ];

    protected $permissions = [
        ['name' => 'system.tutorials.getTableData', 'description' => 'Get table data for tutorials', 'type' => 0, 'default' => false],
        ['name' => 'system.tutorials.exportExcel', 'description' => 'Export excel for tutorials', 'type' => 0, 'default' => false],
        ['name' => 'system.tutorials.initTable', 'description' => 'Init table data for tutorials', 'type' => 0, 'default' => false],
        ['name' => 'system.tutorials.create', 'description' => 'Create tutorial', 'type' => 1, 'default' => false],
        ['name' => 'system.tutorials.edit', 'description' => 'Edit tutorial', 'type' => 1, 'default' => false],
        ['name' => 'system.tutorials.index', 'description' => 'Show tutorials index', 'type' => 0, 'default' => false],
        ['name' => 'system.tutorials.store', 'description' => 'Store newly created tutorial', 'type' => 1, 'default' => false],
        ['name' => 'system.tutorials.update', 'description' => 'Update edited tutorial', 'type' => 1, 'default' => false],
        ['name' => 'system.tutorials.show', 'description' => 'Load tutorial', 'type' => 0, 'default' => true],
        ['name' => 'system.tutorials.destroy', 'description' => 'Delete tutorial', 'type' => 1, 'default' => false],
    ];

    protected $menu = [
        'name' => 'Tutorials', 'icon' => 'fa fa-fw fa-book', 'link' => 'system.tutorials.index', 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
