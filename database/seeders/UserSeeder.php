<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'RoomzHub Admin';
        $user->email = 'admin@roomzhub.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'RoomzHub Vendor';
        $user->email = 'vendor@roomzhub.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'Test Customer';
        $user->email = 'customer@roomzhub.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}
