<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DevController extends Controller
{
    public function makeUser()
    {
        \DB::table('users')->insert([
            'role' => 'Admin',
            'name' => 'Admin',
            'no_hp' => '0123456789',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);
        
        \DB::table('users')->insert([
            'role' => 'Members',
            'name' => 'Customer 1',
            'no_hp' => '08151863421',
            'email' => 'customer@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        return 'skses';
    }
}
