<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reports');
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('files_id')->unsigned()->index();
            $table->integer('users_id')->unsigned()->index();
            $table->string('content');
            $table->integer('status')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->foreign('files_id')->references('id')->on('files');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
