<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SUPER ADMIN
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'filmore.david.liongson@gmail.com',
            'password' => Hash::make('Filmore08')
        ]);

        $superAdmin->assignRole('Super Admin');


        //ADMIN
        $admin= User::create([
            'name' => 'Admin',
            'email' => 'rbuan@gmail.com',
            'password' => Hash::make('Buan08')
        ]);

        $admin->assignRole('Admin');

        //VISITOR
        $visitor = User::create([
            'name' => 'Visitor',
            'email' => 'visitor@gmail.com',
            'password' => Hash::make('Visitor123')
        ]);

        $visitor->assignRole('Visitor');


        //No Roles
        $noRoles = User::create([
            'name' => 'Unknown User',
            'email' => 'unknown@gmail.com',
            'password' => Hash::make('Unknown123')
        ]);
    }
}
