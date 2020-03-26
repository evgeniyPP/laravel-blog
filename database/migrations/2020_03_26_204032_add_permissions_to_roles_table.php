<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionsToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->tinyInteger('can_add_post')->default(0);
            $table->tinyInteger('can_edit_post')->default(0);
            $table->tinyInteger('can_delete_post')->default(0);
            $table->tinyInteger('can_promote_users')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('can_add_post');
            $table->dropColumn('can_edit_post');
            $table->dropColumn('can_delete_post');
            $table->dropColumn('can_promote_users');
        });
    }
}
