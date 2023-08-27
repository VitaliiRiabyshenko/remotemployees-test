<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Category::factory(50)->create();

        // \App\Models\Lot::factory(50)->create();

        \App\Models\Category::factory(20)->create()->each(function ($u) {
            $u->lots()->save(\App\Models\Lot::factory()->make());
        });
    
        \App\Models\Lot::factory(50)->create()->each(function ($u) {
            $u->categories()->save(\App\Models\Category::factory()->make());
        });
    }
}
