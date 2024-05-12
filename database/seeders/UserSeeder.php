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
            'studentID' => 'ADM21146',
            'ic' => '981010010678',
            'program' => 'Diploma in Computer Science',
            'faculty' => 'Faculty of Computing',
            'year' => '4',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123456789'),
        ]);
    }
}
