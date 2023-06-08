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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("user_id");
            $table->string("name", 60);
            $table->string("slug", 150);
            $table->text("body");
            $table->string("image")->nullable();
            $table->boolean("status")->default(0);
            $table->string("tags")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->string("seo_description")->nullable();
            $table->integer("read_count")->nullable();
            $table->integer("like_count")->nullable();
            $table->integer("view_count")->nullable();
            $table->dateTime("publish_date");
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
