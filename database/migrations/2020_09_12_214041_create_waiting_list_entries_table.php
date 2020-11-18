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
            $table->integer('msuid');
            $table->foreign('msuid')->references('msuid')->on('users');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('major');
            $table->string('course_selection');
            $table->string('type');
            $table->string('campus');
            $table->string('graduation_time');
            $table->integer('current_hours');
            $table->string('is_required');
            $table->string('comments')->nullable();
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
