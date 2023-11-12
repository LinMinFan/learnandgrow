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
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable()->comment('文章代稱');
            $table->string('title')->nullable()->comment('標題');
            $table->mediumText('meta_keywords')->nullable()->comment('關鍵字');
            $table->mediumText('meta_description')->nullable()->comment('描述');
            $table->longText('content')->nullable()->comment('內文');
            $table->string('image')->nullable()->comment('圖片');
            $table->integer('top')->comment('置頂')->default(0);
            $table->integer('sort')->nullable()->comment('排序');
            $table->integer('status')->nullable()->comment('狀態,0:停用,1:啟用,3:定時');
            $table->dateTime('published_at')->nullable();
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
        Schema::dropIfExists('post');
    }
};
