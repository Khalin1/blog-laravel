<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('posts_categories')){
            Schema::create('posts_categories', function (Blueprint $table){
                $table->increments('id');
                $table->integer('post_id');
                $table->integer('category_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('posts_categories')){
            Schema::drop('posts_categories');
        }
    }
}
