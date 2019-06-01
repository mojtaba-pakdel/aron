<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->default(0);
            //$table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->integer('viewCount')->default(0);
            $table->integer('status')->default(0);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
        Schema::create('article_category', function(Blueprint $table){
           $table->integer('article_id')->unsigned();
           $table->integer('category_id')->unsigned();
           $table->primary(['article_id','category_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('article_category');
    }
}
