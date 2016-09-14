<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('concept');
            $table->string('department', 60);
            $table->text('objetives');
            $table->integer('impact_studTeach');
            $table->integer('teacherEnvol');
            $table->text('description');
            $table->tinyInteger('status')->default(1);
            $table->integer('user_id');
            $table->dateTime('date_event');
            $table->dateTime('end_event');
            $table->timestamps();
            $table->string('slug')->nullable();
            $table->char('picture', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
