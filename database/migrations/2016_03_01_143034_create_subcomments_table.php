<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subcomments')){
            Schema::create('subcomments', function (Blueprint $table){
                $table->increments('id');
                $table->integer('parent_id');
                $table->integer('comment_id');
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
        if(Schema::hasTable('subcomments')){
            Schema::drop('subcomments');
        }
    }
}
