<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForTutorialManager extends StructureMigration
{
    protected $permissions = [
        ['name' => 'system.tutorials.tableData', 'description' => 'Get table data for tutorials', 'type' => 0, 'is_default' => false],
        ['name' => 'system.tutorials.exportExcel', 'description' => 'Export excel for tutorials', 'type' => 0, 'is_default' => false],
        ['name' => 'system.tutorials.initTable', 'description' => 'Init table data for tutorials', 'type' => 0, 'is_default' => false],
        ['name' => 'system.tutorials.create', 'description' => 'Create tutorial', 'type' => 1, 'is_default' => false],
        ['name' => 'system.tutorials.edit', 'description' => 'Edit tutorial', 'type' => 1, 'is_default' => false],
        ['name' => 'system.tutorials.index', 'description' => 'Show tutorials index', 'type' => 0, 'is_default' => false],
        ['name' => 'system.tutorials.store', 'description' => 'Store newly created tutorial', 'type' => 1, 'is_default' => false],
        ['name' => 'system.tutorials.update', 'description' => 'Update edited tutorial', 'type' => 1, 'is_default' => false],
        ['name' => 'system.tutorials.show', 'description' => 'Load tutorial', 'type' => 0, 'is_default' => true],
        ['name' => 'system.tutorials.destroy', 'description' => 'Delete tutorial', 'type' => 1, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Tutorials', 'icon' => 'book', 'route' => 'system.tutorials.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
