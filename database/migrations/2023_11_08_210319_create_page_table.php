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
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->comment('代稱')->unique();
            $table->text('title', 100)->nullable()->comment('標題');
            $table->text('meta_keywords')->nullable()->comment('關鍵字');
            $table->text('meta_description')->nullable()->comment('描述');
            $table->mediumText('content')->nullable()->comment('內容');
            $table->string('image')->nullable()->comment('頁面預設圖檔');
            $table->integer('status')->nullable()->comment('狀態');
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
        Schema::dropIfExists('page');
    }
};
