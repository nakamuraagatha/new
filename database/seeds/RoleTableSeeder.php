<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Permission Operator dan Admin
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'update-user']);
        
        // Permission Operator Reskrim
        Permission::create(['name' => 'edit-laporanreskrim']);
        Permission::create(['name' => 'delete-laporanreskrim']);
        Permission::create(['name' => 'create-laporanreskrim']);
        Permission::create(['name' => 'view-laporanreskrim']);
        Permission::create(['name' => 'update-laporanreskrim']);
        
        // Permission Operator
        Permission::create(['name' => 'edit-laporannarkoba']);
        Permission::create(['name' => 'delete-laporannarkoba']);
        Permission::create(['name' => 'create-laporannarkoba']);
        Permission::create(['name' => 'view-laporannarkoba']);
        Permission::create(['name' => 'update-laporannarkoba']);
        
        // Permission Admin
        Permission::create(['name' => 'edit-all']);
        Permission::create(['name' => 'delete-all']);
        Permission::create(['name' => 'create-all']);
        Permission::create(['name' => 'view-all']);
        Permission::create(['name' => 'update-all']);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'opsnarkoba']);
        $role->givePermissionTo('edit-user');
        $role->givePermissionTo('delete-user');
        $role->givePermissionTo('create-user');
        $role->givePermissionTo('view-user'); 
        $role->givePermissionTo('update-user');
        
        $role->givePermissionTo('create-laporannarkoba');
        $role->givePermissionTo('edit-laporannarkoba');
        $role->givePermissionTo('delete-laporannarkoba');
        $role->givePermissionTo('view-laporannarkoba'); 
        $role->givePermissionTo('update-laporannarkoba');
        
        $role = Role::create(['name' => 'pelapornarkoba']);
        $role->givePermissionTo('view-laporannarkoba');
        
        $role = Role::create(['name' => 'opsreskrim']);
        $role->givePermissionTo('edit-user');
        $role->givePermissionTo('delete-user');
        $role->givePermissionTo('create-user');
        $role->givePermissionTo('view-user'); 
        $role->givePermissionTo('update-user');
        
        $role->givePermissionTo('create-laporanreskrim');
        $role->givePermissionTo('edit-laporanreskrim');
        $role->givePermissionTo('delete-laporanreskrim');
        $role->givePermissionTo('view-laporanreskrim'); 
        $role->givePermissionTo('update-laporanreskrim');
        
        $role = Role::create(['name' => 'pelaporreskrim']);
        $role->givePermissionTo('view-laporanreskrim');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('edit-all');
        $role->givePermissionTo('create-all');
        $role->givePermissionTo('view-all');
        $role->givePermissionTo('delete-all');
        $role->givePermissionTo('update-all');
    }
}
