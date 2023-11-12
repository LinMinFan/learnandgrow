<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('文章分類的標題');
            $table->string('slug')->comment('文章分類的代稱');
            $table->integer('parent_id')->nullable()->comment('文章分類的上層');
            $table->integer('sort')->nullable()->comment('排序');
            $table->text('keywords')->nullable()->comment('文章分類關鍵字');
            $table->text('description')->nullable()->comment('文章分類描述');
            $table->integer('size')->comment('每頁筆數')->default(15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category');
    }
};
