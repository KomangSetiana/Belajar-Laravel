<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        User::create([
            'name' => 'I Komang Setiana',
            'username' => 'bima',
            'email' => 'komangsetiana@gmail.com',
            'password' => bcrypt('123456789')
        ]);

        // User::create ([
        //     'name' => 'Bimasena',
        //     'email' => 'bimasena@gmail.com',
        //     'password' => bcrypt('1234')
        // ]);

        post::factory(20)->create();

        Category::create([
            'name' => 'Programing',
            'slug' => 'programing'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Web-design',
            'slug' => 'web-design'
        ]);
        // post::create([

        //     'tittle' => 'judul satu',
        //     'category_id' => 1,
        //     'slug' => 'slug-satu',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, repudiandae.',
        //     'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Tempore rem optio maxime aliquam ut quisquam earum animi. Optio explicabo voluptates maxime eligendi earum rem cum praesentium ut officia vero nostrum molestiae eaque et officiis, tempore necessitatibus quibusdam, magni distinctio iusto </p><p>voluptatum placeat illo! Eligendi deleniti cum saepe reprehenderit facilis, doloribus ullam optio nam ipsum? Beatae accusamus autem odit pariatur officia totam assumenda repellat aliquid, tenetur rerum ea, cupiditate labore maxime eligendi iste. Magnam ut nesciunt exercitationem amet quos, maxime iste facere velit delectus, repellat laudantium dolorum, fuga fugit non aut. Quos quas nostrum, nihil vitae modi alias natus praesentium in hic similique est fugit. Illum, dolorum magni natus minus quis deserunt molestias fugiat nam assumenda. In expedita iure unde animi.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet architecto, totam, laudantium, fugit unde mollitia esse velit alias quis reiciendis porro praesentium voluptates. Perferendis harum possimus asperiores sunt esse!</p>',
        //     'user_id' => 1
        // ]);
        // post::create([

        //     'tittle' => 'judul dua',
        //     'category_id' => 1,
        //     'slug' => 'slug-dua',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, repudiandae.',
        //     'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Tempore rem optio maxime aliquam ut quisquam earum animi. Optio explicabo voluptates maxime eligendi earum rem cum praesentium ut officia vero nostrum molestiae eaque et officiis, tempore necessitatibus quibusdam, magni distinctio iusto </p><p>voluptatum placeat illo! Eligendi deleniti cum saepe reprehenderit facilis, doloribus ullam optio nam ipsum? Beatae accusamus autem odit pariatur officia totam assumenda repellat aliquid, tenetur rerum ea, cupiditate labore maxime eligendi iste. Magnam ut nesciunt exercitationem amet quos, maxime iste facere velit delectus, repellat laudantium dolorum, fuga fugit non aut. Quos quas nostrum, nihil vitae modi alias natus praesentium in hic similique est fugit. Illum, dolorum magni natus minus quis deserunt molestias fugiat nam assumenda. In expedita iure unde animi.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet architecto, totam, laudantium, fugit unde mollitia esse velit alias quis reiciendis porro praesentium voluptates. Perferendis harum possimus asperiores sunt esse!</p>',
        //     'user_id' => 1
        // ]);
        // post::create([

        //     'tittle' => 'judul tiga',
        //     'category_id' => 2,
        //     'slug' => 'slug-tiga',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, repudiandae.',
        //     'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Tempore rem optio maxime aliquam ut quisquam earum animi. Optio explicabo voluptates maxime eligendi earum rem cum praesentium ut officia vero nostrum molestiae eaque et officiis, tempore necessitatibus quibusdam, magni distinctio iusto </p><p>voluptatum placeat illo! Eligendi deleniti cum saepe reprehenderit facilis, doloribus ullam optio nam ipsum? Beatae accusamus autem odit pariatur officia totam assumenda repellat aliquid, tenetur rerum ea, cupiditate labore maxime eligendi iste. Magnam ut nesciunt exercitationem amet quos, maxime iste facere velit delectus, repellat laudantium dolorum, fuga fugit non aut. Quos quas nostrum, nihil vitae modi alias natus praesentium in hic similique est fugit. Illum, dolorum magni natus minus quis deserunt molestias fugiat nam assumenda. In expedita iure unde animi.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet architecto, totam, laudantium, fugit unde mollitia esse velit alias quis reiciendis porro praesentium voluptates. Perferendis harum possimus asperiores sunt esse!</p>',
        //     'user_id' => 1
        // ]);
        // post::create([

        //     'tittle' => 'judul empat',
        //     'category_id' => 2,
        //     'slug' => 'slug-empat',
        //     'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat, repudiandae.',
        //     'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Tempore rem optio maxime aliquam ut quisquam earum animi. Optio explicabo voluptates maxime eligendi earum rem cum praesentium ut officia vero nostrum molestiae eaque et officiis, tempore necessitatibus quibusdam, magni distinctio iusto </p><p>voluptatum placeat illo! Eligendi deleniti cum saepe reprehenderit facilis, doloribus ullam optio nam ipsum? Beatae accusamus autem odit pariatur officia totam assumenda repellat aliquid, tenetur rerum ea, cupiditate labore maxime eligendi iste. Magnam ut nesciunt exercitationem amet quos, maxime iste facere velit delectus, repellat laudantium dolorum, fuga fugit non aut. Quos quas nostrum, nihil vitae modi alias natus praesentium in hic similique est fugit. Illum, dolorum magni natus minus quis deserunt molestias fugiat nam assumenda. In expedita iure unde animi.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt amet architecto, totam, laudantium, fugit unde mollitia esse velit alias quis reiciendis porro praesentium voluptates. Perferendis harum possimus asperiores sunt esse!</p>',
        //     'user_id' => 2
        // ]);

    }
}
