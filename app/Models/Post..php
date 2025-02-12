<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            'title' => 'Judul Artikel Pertama',
            'slug' => 'judul-artikel-pertama',
            'author' => 'Christian Luis',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed adipisci placeat unde debitis possimus, doloremque
                        voluptates laboriosam necessitatibus eaque magni. Harum architecto vel consectetur maxime illo, assumenda ducimus quas
                        molestiae quaerat, saepe tempora corporis repudiandae minus tenetur delectus earum sapiente soluta cupiditate a aut.
                        Ipsam iusto nisi alias laboriosam porro eaque molestiae amet quasi dicta? Deserunt ea, soluta quod quisquam eaque at
                        illo temporibus repudiandae laudantium quis laboriosam dolor cum veritatis dolores delectus facere cumque voluptatibus.
                        Delectus, corrupti! Nobis, consequuntur!'
        ],
        [
            'title' => 'Judul Artikel Kedua',
            'slug' => 'judul-artikel-kedua',
            'author' => 'Someone Spesial',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed adipisci placeat unde debitis possimus, doloremque
                        voluptates laboriosam necessitatibus eaque magni. Harum architecto vel consectetur maxime illo, assumenda ducimus quas
                        molestiae quaerat, saepe tempora corporis repudiandae minus tenetur delectus earum sapiente soluta cupiditate a aut.
                        Ipsam iusto nisi alias laboriosam porro eaque molestiae amet quasi dicta? Deserunt ea, soluta quod quisquam eaque at
                        illo temporibus repudiandae laudantium quis laboriosam dolor cum veritatis dolores delectus facere cumque voluptatibus.
                        Delectus, corrupti! Nobis, consequuntur!'
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
