<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddPoNoIdPRitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_ritems', function (Blueprint $table) {
            if (!Schema::hasColumn('p_ritems', 'po_no_id')){
                $table->string('po_no_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_ritems', function (Blueprint $table) {
            $table->dropColumn(['po_no_id']);
        });
    }
}
