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
        Schema::create('site', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->comment('網站標題');
            $table->text('keywords')->nullable()->comment('關鍵字');
            $table->text('description')->nullable()->comment('網站描述');
            $table->text('google_ga4')->nullable()->comment('google ga4');
            $table->text('google_gtag')->nullable()->comment('google gtag');
            $table->string('copyright')->nullable()->comment('版權所有');
            $table->string('email')->nullable()->comment('Email');
            $table->string('favicon')->nullable()->comment('網站標誌');
            $table->string('logo')->nullable()->comment('網站LOGO');
            $table->string('og_image')->nullable()->comment('meta 圖片');
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
        Schema::dropIfExists('site');
    }
};
