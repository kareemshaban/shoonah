<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table -> string('title_ar');
            $table -> string('title_en');
            $table -> string('publisher');
            $table -> timestamp('date');
            $table -> string('mainImg');
            $table -> text('details_ar');
            $table -> text('details_en');
            $table -> string('img1');
            $table -> string('img2');
            $table -> string('img3');
            $table -> integer('isVisible');
            $table -> integer('user_ins') -> default(0);
            $table -> integer('user_upd') -> default(0);
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
        Schema::dropIfExists('news');
    }
}
