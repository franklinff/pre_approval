<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressGstinUinPanToCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('gstin_uin')->after("logo_path")->nullable();
            $table->string('pan')->after("logo_path")->nullable();
            $table->text('address')->after("logo_path")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->dropColumn('gstin_uin');
            $table->dropColumn('pan');
            $table->dropColumn('address');
        });
    }
}
