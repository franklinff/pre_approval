<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_rnumbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('pr_no');
            $table->string('requested_by');
            $table->timestamp('dor');
            $table->string('material_req_on_or_before');
            $table->string('material_req_company_department');
            $table->integer('delivery_location');
            $table->string('vendor_supplier_name');
            $table->string('phone_no');
            $table->longText('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_rnumbers');
    }
}
