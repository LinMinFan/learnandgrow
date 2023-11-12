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
        Schema::create('post_to_category', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedInteger('category_id');
            $table->primary(['post_id', 'category_id']);
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_to_category');
    }
};
