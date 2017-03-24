<?php

use Illuminate\Database\Migrations\Migration;
use LaravelEnso\Core\App\Classes\StructureManager\StructureSupport;

class CreateStructureForTutorialManager extends Migration
{
    use StructureSupport;

    private $permissionsGroup = [
        'name' => 'system.tutorials', 'description' => 'Tuturials Permissions Group',
    ];

    private $permissions = [
        ['name' => 'system.tutorials.getTableData', 'description' => 'Get table data for tutorials', 'type' => 0],
        ['name' => 'system.tutorials.initTable', 'description' => 'Init table data for tutorials', 'type' => 0],
        ['name' => 'system.tutorials.create', 'description' => 'Create Tutorial', 'type' => 1],
        ['name' => 'system.tutorials.edit', 'description' => 'Edit Tutorial', 'type' => 1],
        ['name' => 'system.tutorials.index', 'description' => 'List Tutorials', 'type' => 0],
        ['name' => 'system.tutorials.store', 'description' => 'Save Tutorial', 'type' => 1],
        ['name' => 'system.tutorials.update', 'description' => 'Update Tutorial', 'type' => 1],
        ['name' => 'system.tutorials.getTutorial', 'description' => 'Load Tutorial', 'type' => 0],
        ['name' => 'system.tutorials.destroy', 'description' => 'Delete Tutorial', 'type' => 1],
    ];

    private $menu = [
        'name' => 'Tutorials', 'icon' => 'fa fa-fw fa-book', 'link' => 'system/tutorials', 'has_children' => 0,
    ];

    private $parentMenu = 'System';
    private $roles;
}
