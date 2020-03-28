<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'Автор',
            'can_add_post' => 1
        ]);

        Role::create([
            'role' => 'Модератор',
            'can_add_post' => 1,
            'can_edit_post' => 1,
            'can_delete_post' => 1,
            'can_approve_posts' => 1
        ]);

        Role::create([
            'role' => 'Администратор',
            'can_add_post' => 1,
            'can_edit_post' => 1,
            'can_delete_post' => 1,
            'can_approve_posts' => 1,
            'can_promote_users' => 1
        ]);
    }
}
