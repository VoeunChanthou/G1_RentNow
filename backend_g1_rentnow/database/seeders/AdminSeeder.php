<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Shop;
use App\Models\Categories;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'phone_number'=>'09837434',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
            'profile' => 'user.avif'
        ]);

        $writer = User::create([
            'first_name'=>'chanthou',
            'last_name'=>'Voeun',
            'phone_number'=>'090766633',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password')
        ]);
        


        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);

        $category = Shop::create([
            'name'=>'Electronics',
            'user_id'=> 3,
            'Country'=>'Cambodia',
            'Province'=>'Kompong Thom',
            'street'=>'371',
            'latitude'=>'03843.34',
            'longitude'=>'4532424'
        ]);

        $category = Categories::create([
            'name'=>'Laptop',
        ]);


        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
