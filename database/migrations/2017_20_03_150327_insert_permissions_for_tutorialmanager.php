<?php

use App\Permission;
use App\PermissionsGroup;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class InsertPermissionsForTutorialManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionsGroup = PermissionsGroup::whereName('system.tutorials')->first();

        if ($permissionsGroup) {
            return;
        }

        \DB::transaction(function () {
            $permissionsGroup = new PermissionsGroup([
                'name'        => 'system.tutorials',
                'description' => 'Tutorial Manager Permissions Group',
            ]);

            $permissionsGroup->save();

            $permissions = [
                [
                    'name'        => 'system.tutorials.getTableData',
                    'description' => 'Get table data for tutorials',
                    'type'        => 0,
                ],
                [
                    'name'        => 'system.tutorials.initTable',
                    'description' => 'Init table data for tutorials',
                    'type'        => 0,
                ],
                [
                    'name'        => 'system.tutorials.create',
                    'description' => 'Create Tutorial',
                    'type'        => 1,
                ],
                [
                    'name'        => 'system.tutorials.edit',
                    'description' => 'Edit Tutorial',
                    'type'        => 1,
                ],
                [
                    'name'        => 'system.tutorials.index',
                    'description' => 'List Tutorials',
                    'type'        => 0,
                ],
                [
                    'name'        => 'system.tutorials.store',
                    'description' => 'Save Tutorial',
                    'type'        => 1,
                ],
                [
                    'name'        => 'system.tutorials.update',
                    'description' => 'Update Tutorial',
                    'type'        => 1,
                ],
                [
                    'name'        => 'system.tutorials.getTutorial',
                    'description' => 'Load Tutorial',
                    'type'        => 0,
                ],
                [
                    'name'        => 'system.tutorials.destroy',
                    'description' => 'Delete Tutorial',
                    'type'        => 1,
                ],
            ];

            $adminRole = Role::whereName('admin')->first();

            foreach ($permissions as $permission) {
                $permission = new Permission($permission);
                $permissionsGroup->permissions()->save($permission);
                $adminRole->permissions()->save($permission);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::transaction(function () {
            $permissionsGroup = PermissionsGroup::whereName('system.tutorials')->first();
            $permissionsGroup->permissions->each->delete();
            $permissionsGroup->delete();
        });
    }
}
