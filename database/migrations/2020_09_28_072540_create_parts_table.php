<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->string('type', 10);
            $table->unsignedBigInteger('podcast_id')->nullable();
            $table->text('file_url');
            $table->string('file_time',10)->default('00:00:00');
            $table->string('file_size',15)->default('0');
            $table->string('tags');
            $table->integer('number');
            $table->integer('viewCount')->default(0);
            $table->integer('commentCount')->default(0);
            $table->integer('downloadCount')->default(0);
            $table->foreign('podcast_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('parts');
    }
}
