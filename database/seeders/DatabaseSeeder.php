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
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//        \App\Models\Category::factory(10)->create();
//        \App\Models\Product::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Admin::factory()->create([
            'name' => 'ruby',
            'email' => 'ruby@gmail.com',
            'password' => Hash::make('ruby@gmail.com'),
            'remember_token' => 1,
        ]);

    }
}
