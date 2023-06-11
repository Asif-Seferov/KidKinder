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
        Schema::create('article_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("parent_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("article_id");
            $table->text("comment");
            $table->tinyInteger("status")->default(0);
            $table->integer("like_count")->default(0);
            $table->integer("unlike_count")->default(0);

            $table->timestamps();

            $table->foreign("parent_id")
            ->references("id")
            ->on("article_comments");

            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");

            $table->foreign("article_id")
            ->references("id")
            ->on("articles")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_comments');
    }
};
