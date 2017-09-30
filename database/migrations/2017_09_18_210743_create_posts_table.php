<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('post_title',140);
            $table->string('slug',140);
            $table->text('post_content');
            $table->text('featured_img')->nullable();
            $table->Integer('user_id')->unsigned();
            $table->Integer('category_id')->unsigned();;
            $table->Integer('comment_count', false, false)->nullable();
            $table->boolean('post_status')->default(0);
            $table->timestamps();
        });

         Schema::table('posts', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
