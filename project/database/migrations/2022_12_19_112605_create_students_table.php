<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId("class_id")->constrained('grades');
            //$table->integer("class_teacher_id")->nullable();
            $table->integer("number_of_absences")->nullable();
            $table->string("about", )->nullable();
            $table->string("attendance", 2000)->nullable();
            $table->string("uwagi", 2000)->nullable();
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
        Schema::dropIfExists('students');
    }
};
