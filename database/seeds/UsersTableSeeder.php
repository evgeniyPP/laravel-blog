<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => $faker->firstName(),
                'surname' => $faker->lastName(),
                'login' => "user{$i}",
                'password' => password_hash('12345', \PASSWORD_DEFAULT)
            ]);
        }
    }
}
