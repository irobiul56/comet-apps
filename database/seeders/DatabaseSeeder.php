<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Admin::create([
            'name'          => 'Provider',
            'email'         => 'provider@gmail.com',
            'cell'          => '01763264270',
            'username'      => 'provider',
            'password'      => Hash::make('asdfg'),

        ]);
    }
}
