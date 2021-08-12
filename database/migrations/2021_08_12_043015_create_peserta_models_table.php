<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant', function (Blueprint $table) {
            $table->bigIncrements('participant_id');
            $table->string('name');
            $table->string('nim');
            $table->integer('facultas_id');
            $table->integer('major_id');
            $table->integer('division_id');
            $table->integer('sub_division_id');
            $table->string('place_of_birth');
            $table->enum('gender',['m', 'w']);
            $table->string('address');
            $table->string('domicile');
            $table->string('phone');
            $table->string('habbit');
            $table->string('fiuture_goals');
            $table->string('desease_history');
            $table->string('laptop_brand');
            $table->string('laptop_processor');
            $table->integer('laptop_ram');
            $table->string('laptop_vga');
            $table->enum('zone', ['g', 'y', 'r'])->default('g');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant');
    }
}
