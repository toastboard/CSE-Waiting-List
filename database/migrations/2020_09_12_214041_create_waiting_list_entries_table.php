<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitingListEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_list_entries', function (Blueprint $table) {
            $table->id('list');
            $table->foreignId('id')->constrained('users');
            $table->foreignId('email')->constrained('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('major');
            $table->foreignId('field')->constrained('courses');
            $table->foreignId('course_number')->constrained('courses');
            $table->string('type');
            $table->string('campus');
            $table->string('date'); // could make an actual date entry?
            $table->string('time');
            $table->string('graduation_time');
            $table->integer('current_hours');
            $table->string('is_required');
            $table->string('comments');
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
        Schema::dropIfExists('waiting_list_entries');
    }
}
