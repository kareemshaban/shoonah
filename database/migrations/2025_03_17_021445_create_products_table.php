<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> integer('brand_id');
            $table -> integer('department_id');
            $table -> integer('category_id');
            $table -> string('code');
            $table -> string('name_ar');
            $table -> string('name_en');
            $table -> text('description_ar');
            $table -> text('description_en');
            $table -> string('short_description_ar');
            $table -> string('short_description_en');
            $table -> string('tag');
            $table -> integer('isPrivate');
            $table -> integer('isAvailable');
            $table -> integer('type');
            $table -> string('mainImg');
            $table -> string('img1') -> nullable();
            $table -> string('img2') -> nullable();
            $table -> string('img3') -> nullable();
            $table -> string('img4') -> nullable();
            $table -> integer('isReviewed');
            $table -> integer('isTop');
            $table -> integer('user_ins') -> default(0) ;
            $table -> integer('user_upd') -> default(0) ;
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
        Schema::dropIfExists('products');
    }
}
