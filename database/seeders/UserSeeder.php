<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'name' => 'super_admin',
                'email' => 'super_admin@super_admin.com',
                'role'  => 'super_admin',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role'  => 'admin',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'staff',
                'email' => 'staff@staff.com',
                'role'  => 'staff',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'customer1',
                'email' => 'customer1@customer.com',
                'role'  => 'customer',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'customer2',
                'email' => 'customer2@customer.com',
                'role'  => 'customer',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'customer3',
                'email' => 'customer3@customer.com',
                'role'  => 'customer',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'customer4',
                'email' => 'customer4@customer.com',
                'role'  => 'customer',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'owner1',
                'email' => 'owner1@owner.com',
                'role'  => 'owner',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'owner2',
                'email' => 'owner2@owner.com',
                'role'  => 'owner',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'owner3',
                'email' => 'owner3@owner.com',
                'role'  => 'owner',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
            [
                'name' => 'owner4',
                'email' => 'owner4@owner.com',
                'role'  => 'owner',
                'password' => password_hash('password', PASSWORD_DEFAULT)
            ],
        ]);
    }
}
