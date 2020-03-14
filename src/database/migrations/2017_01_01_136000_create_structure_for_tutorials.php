<?php

use LaravelEnso\Migrator\App\Database\Migration;

class CreateStructureForTutorials extends Migration
{
    protected $permissions = [
        ['name' => 'system.tutorials.tableData', 'description' => 'Get table data for tutorials', 'is_default' => false],
        ['name' => 'system.tutorials.exportExcel', 'description' => 'Export excel for tutorials', 'is_default' => false],
        ['name' => 'system.tutorials.initTable', 'description' => 'Init table data for tutorials', 'is_default' => false],
        ['name' => 'system.tutorials.create', 'description' => 'Create tutorial', 'is_default' => false],
        ['name' => 'system.tutorials.edit', 'description' => 'Edit tutorial', 'is_default' => false],
        ['name' => 'system.tutorials.index', 'description' => 'Show tutorials index', 'is_default' => false],
        ['name' => 'system.tutorials.store', 'description' => 'Store newly created tutorial', 'is_default' => false],
        ['name' => 'system.tutorials.update', 'description' => 'Update edited tutorial', 'is_default' => false],
        ['name' => 'system.tutorials.load', 'description' => 'Load tutorial', 'is_default' => true],
        ['name' => 'system.tutorials.destroy', 'description' => 'Delete tutorial', 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Tutorials', 'icon' => 'book', 'route' => 'system.tutorials.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
