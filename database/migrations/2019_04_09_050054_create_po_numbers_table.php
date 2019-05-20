<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('po_no');
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
        Schema::dropIfExists('po_numbers');
    }
}
