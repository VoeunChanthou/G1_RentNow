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

        $shopOwner = User::create([
            'first_name'=>'Sothea',
            'last_name'=>'Voeun',
            'phone_number'=>'090745423',
            'email'=>'sothea@gmail.com',
            'password'=>bcrypt('password')
        ]);
        


        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'user']);
        $shop_role = Role::create(['name' => 'Shop owner']);

        $permission = Permission::create(['name' => 'Product access']);
        $permission = Permission::create(['name' => 'Product edit']);
        $permission = Permission::create(['name' => 'Product create']);
        $permission = Permission::create(['name' => 'Product delete']);

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
            'Province'=>'Phnom penh',
            'street'=>'371',
            'latitude'=>'11.550857',
            'longitude'=>'104.883260'
        ]);
        $category = Shop::create([
            'name'=>'Siemreip Borrowing',
            'Country'=>'Cambodia',
            'Province'=>'Siem Reip Province',
            'street'=>'6 street',
            'latitude'=>'13.364271',
            'longitude'=>'103.854685'
        ]);
        $category = Shop::create([
            'name'=>'Kompongthom Borrowing',
            'Country'=>'Cambodia',
            'Province'=>'Khompong Thom',
            'street'=>'6 street',
            'latitude'=>'11.557119',
            'longitude'=>'104.901151'
        ]);

        $category = Categories::create([
            'name'=>'Laptop',
        ]);
        $category = Categories::create([
            'name'=>'vichel',
        ]);


        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);
        $shopOwner->assignRole($shop_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
