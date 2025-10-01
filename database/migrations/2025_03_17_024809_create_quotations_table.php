<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('ref_no');
            $table->integer('supplier_id');
            $table->integer('client_id');
            $table->timestamp('date');
            $table->decimal('total');
            $table->decimal('discount');
            $table->decimal('net');
            $table->text('notes');
            $table -> integer('state') -> default(0);
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
        Schema::dropIfExists('quotations');
    }
}
