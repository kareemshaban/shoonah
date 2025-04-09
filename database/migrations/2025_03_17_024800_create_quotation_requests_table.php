<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table -> integer('client_id');
            $table -> integer('supplier_id');
            $table -> integer('state');
            $table -> timestamp('date');
            $table -> string('phone');
            $table -> text('address');
            $table -> text('notes');
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
        Schema::dropIfExists('quotation_requests');
    }
}
