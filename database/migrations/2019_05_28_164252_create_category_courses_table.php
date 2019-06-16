<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->unsigned();
            //$table->foreign('parent_id')->references('id')->on('category_courses')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->integer('viewCount')->default(0);
            $table->integer('status')->default(0);
            $table->integer('commentCount')->default(0);
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
        Schema::create('category_course_course', function(Blueprint $table){
            $table->integer('category_course_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->primary(['course_id','category_course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_courses');
        Schema::dropIfExists('category_course_course');
    }
}
