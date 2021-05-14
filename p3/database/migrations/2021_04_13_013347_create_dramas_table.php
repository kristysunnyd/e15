<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dramas', function (Blueprint $table) {
            // primary key
            $table->id();

            // time
            $table->timestamps();

            $table->string('slug');
            $table->string('drama_title');
            $table->string('director');
            $table->text('main_cast');
            $table->text('genre');
            $table->string('image_url');
            $table->date('air_date');
            $table->string('episode_duration');
            $table->string('num_episodes');
            $table->text('description');
            $table->string('production_company')->nullable();
            $table->string('external_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dramas');
    }
}
