<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddTermsOfDeliveryTablePRnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_rnumbers', function (Blueprint $table) {
            if (!Schema::hasColumn('p_rnumbers', 'terms_of_delivery')) {
                $table->string('terms_of_delivery')->nullable()->after('address');
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
        Schema::table('p_rnumbers', function (Blueprint $table) {
            $table->dropColumn(['terms_of_delivery']);
        });
    }
}
