<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'title' => $faker->realText(50),
                'content' => $faker->realText(2500),
                'user_id' => $faker->biasedNumberBetween(1, 10)
            ]);
        }
    }
}
