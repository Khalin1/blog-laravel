<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subcategories')){
            Schema::create('subcategories', function (Blueprint $table){
                $table->increments('id');
                $table->integer('parent_id');
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
        if(Schema::hasTable('subcategories')){
            Schema::drop('subcategories');
        }
    }
}
