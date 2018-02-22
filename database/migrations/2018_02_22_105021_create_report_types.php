<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('report_types');
        Schema::create('report_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description')->nullable();
          $table->softDeletes();
          $table->timestamps();

          $table->engine = 'InnoDB';
          $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_types');
    }
}
