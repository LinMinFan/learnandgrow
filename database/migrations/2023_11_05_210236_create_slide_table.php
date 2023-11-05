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
        Schema::create('slide', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('圖片標題');
            $table->string('description')->nullable()->comment('圖片描述');
            $table->string('image')->nullable()->comment('桌機版圖片');
            $table->string('mobile_image')->nullable()->comment('手機板圖片');
            $table->string('label')->nullable()->comment('圖片替代文字');
            $table->string('url')->nullable()->comment('圖片連結');
            $table->integer('sort')->default(1);
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
        Schema::dropIfExists('slide');
    }
};
