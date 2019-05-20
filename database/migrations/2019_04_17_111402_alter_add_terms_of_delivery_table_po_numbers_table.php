<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddTermsOfDeliveryTablePoNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_numbers', function (Blueprint $table) {
            if (!Schema::hasColumn('po_numbers', 'terms_of_delivery')) {
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
        Schema::table('po_numbers', function (Blueprint $table) {
            $table->dropColumn(['terms_of_delivery']);
        });
    }
}
