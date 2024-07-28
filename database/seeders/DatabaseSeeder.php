<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        $wd = Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red',
        ]);

        $wp = Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'color' => 'blue',
        ]);

        $fe = Category::create([
            'name' => 'Frontend Enginner',
            'slug' => 'frontend-enginner',
            'color' => 'green',
        ]);

        Post::factory(50)
            ->recycle([$admin, $wd, $wp, $fe, Product::factory(10)->create(), User::factory(5)->create()])
            ->create();
    }
}
