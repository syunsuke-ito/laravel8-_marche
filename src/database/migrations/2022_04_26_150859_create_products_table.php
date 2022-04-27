<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @copyright 2022 ito
 *
 * ecサイト:ProductsTable マイグレーションファイル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
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
            $table->string('name');
            $table->text('information');
            $table->unsignedInteger('price');
            $table->boolean('is_selling');
            $table->integer('sort_order')->nullable();
            $table->foreignId('shop_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('secondary_category_id')
                ->constrained();
            $table->foreignId('image1')
                ->nullable()
                ->constrained('images');
            $table->foreignId('image2')
                ->nullable()
                ->constrained('images');
            $table->foreignId('image3')
                ->nullable()
                ->constrained('images');
            $table->foreignId('image4')
                ->nullable()
                ->constrained('images');
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
