<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::create([
        //     'name' => 'Christian Luis',
        //     'username' => 'christianluis',
        //     'email' => 'christianluisginting@Gmail.com',
        //     'password' => ('Admin123#'),
        // ]);

        // User::create([
        //     'name' => 'Super Admin',
        //     'username' => 'superadmin',
        //     'email' => 'superadmin@Gmail.com',
        //     'password' => ('admin123'),
        // ]);

        // User::factory(3)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        // Post::factory(7)->create();
        // Post::create([
        //     'title' => 'Pemrograman PHP',
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'pemrograman-php',
        //     'excerpt' => 'PHP adalah bahasa pemgrograman yang berfokus di dalam web',
        //     'body' => 'PHP adalah bahasa pemgrograman yang berfokus di dalam web.PHP(hypertext preprocessor) merupakan bahasa pemrograman untuk backend',
        // ]);

        // Post::create([
        //     'title' => 'Pemrograman Javascript',
        //     'user_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'pemrograman-javascript',
        //     'excerpt' => 'Javascript merupakan bahasa pemrograman yang sangat powerfull',
        //     'body' => 'Javascript merupakan bahasa pemrograman yang sangat powerfull.karena kita bisa membuat banyak hal dengan javascript seperti web aplikasi,machine learning,dan lainnya',
        // ]);

        // Post::create([
        //     'title' => 'Sejarah Figma',
        //     'user_id' => 2,
        //     'category_id' => 2,
        //     'slug' => 'sejarah-figma',
        //     'excerpt' => 'Figma adalah tools untuk membuat desain ui dan ux pada sebuah web atau aplikasi',
        //     'body' => 'Figma adalah tools untuk membuat desain ui dan ux pada sebuah web atau aplikasi.ui dan ux ini dibuat oleh UI/UX designer dan akan dibuat kedalam codingan oleh front end developer',
        // ]);
    }
}
