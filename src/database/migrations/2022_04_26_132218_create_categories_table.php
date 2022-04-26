<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @copyright 2022 ito
 *
 * ecサイト:CreateCategoriesTable マイグレーションファイル
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_order');
            $table->timestamps();
        });

        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('sort_order');
            $table->foreignId('primary_category_id')
                ->constrained();
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
        Schema::dropIfExists('secondary_categories');
        Schema::dropIfExists('primary_categories');
    }
}
