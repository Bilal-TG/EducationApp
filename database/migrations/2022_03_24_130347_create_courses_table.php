<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->longText('description')->nullable();
                $table->foreignId('subject_id');
                $table->date('add_time');
                $table->string('course_image')->nullable();
                $table->string('intro_video')->nullable();
                $table->string('keywords')->nullable();
                $table->decimal('price', 15, 2)->nullable();
                $table->decimal('sale_price', 16)->nullable();
                $table->string('total_time')->nullable();
                $table->tinyInteger('status')->nullable()->default(0);
                $table->integer('view_count')->default(0)->nullable();
                $table->integer('featured')->default(0)->nullable();
                $table->tinyInteger('total_lessons')->default(0)->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('courses');
    }
}
