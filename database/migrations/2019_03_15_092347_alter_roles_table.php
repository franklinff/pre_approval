<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRolesTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('roles', function (Blueprint $table) {
        //     $table->integer('parent_id')->change()->nullable();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('roles', function (Blueprint $table) {
        //     $table->dropColumn(['parent_id', 'deleted_at']);
        // });
    }
}
