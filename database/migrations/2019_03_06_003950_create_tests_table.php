<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ref_id_trainer');
            $table->text('question');
            $table->text('ch1');
            $table->text('ch2');
            $table->text('ch3');
            $table->text('ch4');
            $table->integer('answer');
            $table->integer('mode');
            $table->char('type',2);
            $table->text('ref');
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
        Schema::dropIfExists('tests');
    }
}
