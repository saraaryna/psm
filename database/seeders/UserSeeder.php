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
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'name' => 'Admin JHEPA',
            'studentID' => null,
            'ic' => '981010010678',
            'program' => null,
            'faculty' => null,
            'year' => null,
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123456789'),
        ]);

        User::create([
            'id' => '2',
            'name' => 'Sara Aryna',
            'studentID' => 'CB21146 ',
            'ic' => '010516140274',
            'program' => 'Bachelor of Computer Science (Software Engineering) with Honours',
            'faculty' => 'Faculty of Computing',
            'year' => '4',
            'role' => 'Student',
            'email' => 'sara@gmail.com',
            'password' => Hash::make('sara123456789'),
        ]);
    }
}
