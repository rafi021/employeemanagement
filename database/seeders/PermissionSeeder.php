<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $permissionList = [
        'permission-list',
        'permission-create',
        'permission-edit',
        'permission-delete',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'city-list',
        'city-create',
        'city-edit',
        'city-delete',
        'country-list',
        'country-create',
        'country-edit',
        'country-delete',
        'state-list',
        'state-create',
        'state-edit',
        'state-delete',
        'department-list',
        'department-create',
        'department-edit',
        'department-delete',
        'employee-list',
        'employee-create',
        'employee-edit',
        'employee-delete',
        'backup-list',
        'backup-create',
        'backup-download',
        'backup-delete',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissionList as $key => $permision) {
            Permission::updateOrCreate([
                'name' => $permision,
                ]);
            }
    }
}
