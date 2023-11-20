<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','=','brayanibp@brayanibp.dev')->get();
        if ($user != null && $user->isNotEmpty()) {
            return;
        }
        User::create([
            'name' => 'Brayan Bernal',
            'email' => 'brayanibp@brayanibp.dev',
            'birthdate' => '1999-08-23',
            'password' => 'secret'
        ]);
    }
}
