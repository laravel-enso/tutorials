<?php

use LaravelEnso\Migrator\App\Database\Migration;
use LaravelEnso\Permissions\app\Enums\Types;

class CreateStructureForTutorials extends Migration
{
    protected $permissions = [
        ['name' => 'system.tutorials.tableData', 'description' => 'Get table data for tutorials', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'system.tutorials.exportExcel', 'description' => 'Export excel for tutorials', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'system.tutorials.initTable', 'description' => 'Init table data for tutorials', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'system.tutorials.create', 'description' => 'Create tutorial', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'system.tutorials.edit', 'description' => 'Edit tutorial', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'system.tutorials.index', 'description' => 'Show tutorials index', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'system.tutorials.store', 'description' => 'Store newly created tutorial', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'system.tutorials.update', 'description' => 'Update edited tutorial', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'system.tutorials.load', 'description' => 'Load tutorial', 'type' => Types::Read, 'is_default' => true],
        ['name' => 'system.tutorials.destroy', 'description' => 'Delete tutorial', 'type' => Types::Write, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Tutorials', 'icon' => 'book', 'route' => 'system.tutorials.index', 'order_index' => 999, 'has_children' => false,
    ];

    protected $parentMenu = 'System';
}
