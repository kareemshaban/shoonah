<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table -> string("name");
            $table -> string("company");
            $table -> string("logo");
            $table -> integer("country_id");
            $table -> integer("city_id");
            $table -> string("address");
            $table -> string("phone");
            $table -> string("email");
            $table -> string("mobile");
            $table -> string("vatNumber");
            $table -> string("registrationNumber");
            $table -> string("type");
            $table -> integer("user_ins") -> default(0);
            $table -> integer("user_upd") -> default(0);
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
        Schema::dropIfExists('suppliers');
    }
}
