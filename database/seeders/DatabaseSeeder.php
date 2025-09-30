<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();

        // User::factory(10)->create();
        $users = User::factory(10)->create();

        User::create([
            'name' => 'teste',
            'email' => 'teste@gmail.com',
            'password' => 'teste'
        ]);

        Product::factory(50)->create([
        'user_id' => $users->random()->id,
        ]);
    }
}
