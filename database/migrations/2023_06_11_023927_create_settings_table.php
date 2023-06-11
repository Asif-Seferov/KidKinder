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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("home_image");
            $table->string("footer_text")->nullable();
            $table->string("footer_description")->nullable();
            $table->boolean("popular_classes_status")->default(0);
            $table->boolean("our_teachers_status")->default(0);
            $table->string("home_page_text1")->nullable();
            $table->string("home_page_text2")->nullable();
            $table->string("home_page_text3")->nullable();
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
        Schema::dropIfExists('settings');
    }
};
